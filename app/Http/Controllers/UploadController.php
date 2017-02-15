<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\ChunksInRequestUploadHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;

class UploadController extends Controller
{
	public function uploadManga(Request $request) {
		//
	}

	public function uploadChapter(Request $request, $manga_id, $chapter_id = null) {
		//
	}

	public function uploadPage(Request $request, $manga_id, $chapter_id, $page_num) {
		//
	}

	/**
	 * Upload test
	 */
	public function test()
	{
		return view('upload.test');
	}

	/**
	 * Handles the file upload
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * 
	 * @throws UploadMissingFileException
	 */
	public function upload(Request $request)
	{
		// create the file receiver
		$receiver = new FileReceiver("file", $request, ChunksInRequestUploadHandler::class);

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
		$file->move(storage_path('manga'),  $request->name);
		return response()->json(['success' => 'Success upload file']);
	}
}
