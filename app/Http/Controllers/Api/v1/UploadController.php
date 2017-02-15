<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\ChunksInRequestUploadHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class UploadController extends Controller
{
	/**
	 * Handles the file upload
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * 
	 * @throws UploadMissingFileException
	 */
	public function page(Request $request)
	{
		// create the file receiver
		$receiver = new FileReceiver("pages", $request, ChunksInRequestUploadHandler::class);

		// check if the upload is success
		if ($receiver->isUploaded()) {

			// receive the file
			$save = $receiver->receive();

			// check if the upload has finished (in chunk mode it will send smaller files)
			if ($save->isFinished()) {
				// save the file and return any response you need
				return $this->saveFile($save->getFile(), $request);
			} else {
				// we are in chunk mode, lets send the current progress

				/** @var ContentRangeUploadHandler $handler */
				$handler = $save->handler();

				return response()->json([
					"done" => $handler->getPercentageDone(),
					"current" => $handler->getCurrentChunk(),
				]);
			}
		} else {
			throw new UploadMissingFileException();
		}
	}

	public function saveFile($file, $request)
	{
		$str_path = $request->has('path')?$request->path:'images';
		$file->move(storage_path($str_path), $request->name);
		return response()->json(['success' => 'Success upload file', 'filename' => $request->name]);
	}
}
