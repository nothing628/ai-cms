<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Page;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\ChunksInRequestUploadHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Zipper;
use File;

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
		$chapter = Chapter::find($request->chapter_id);

		if ($chapter) {
			$manga = $chapter->manga;
			$destination = storage_path('manga/' . str_slug($manga->title) . '/' . str_slug($chapter->chapter_title));
			$source = $destination . '/' . $request->name;

			$file->move($destination, $request->name);		//Move file to folder manga
			$files = $this->extractTo($source, $destination);

			return response()->json(['success' => true, 'message' => 'Success upload file', 'filename' => $files]);
		} else {
			return response()->json(['success' => false, 'message' => 'Chapter Not Found']);
		}
	}

	public function extractTo($filepath, $destination)
	{
		$zipper = Zipper::make($filepath);
		$zipper->folder('')->extractTo($destination);
		$zipper->close();

		$files = File::files($destination);

		natcasesort($files);					//Order by natural order
		$files = array_values($files);

		return $files;
	}
}
