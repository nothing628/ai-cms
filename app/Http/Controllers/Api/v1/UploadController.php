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
use DB;

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
			$files = [];
			$manga = $chapter->manga;
			$destination = storage_path('manga/' . str_slug($manga->title) . '/' . str_slug($chapter->chapter_title));
			$source = $destination . DIRECTORY_SEPARATOR . $request->name;

			if ($this->isZip($file)) {
				$file->move($destination, $request->name);		//Move file to folder manga
				$files = $this->extractTo($source, $destination);
			} else {
				$files = [ $this->duplicateSave($file, $destination, $request->name) ];
			}

			$this->savePage($chapter, $files);

			return response()->json(['success' => true, 'message' => 'Success upload file', 'files' => $files]);
		} else {
			return response()->json(['success' => false, 'message' => 'Chapter Not Found']);
		}
	}

	public function extractTo($filepath, $destination)
	{
		$pathinfo = pathinfo($filepath);
		$zip_destination = $pathinfo['dirname'] . DIRECTORY_SEPARATOR . $pathinfo['filename'];

		$zipper = Zipper::make($filepath);
		$zipper->folder('')->extractTo($zip_destination);
		$zipper->close();
		File::delete($filepath);	//Delete zip after extract

		$files = [];
		$zip_files = File::files($zip_destination);

		//move to chapter_folder
		foreach ($zip_files as $index => $zip_file) {
			$new_file = $this->duplicateName($destination, basename($zip_file));		//Prevent duplication filename

			File::move($zip_file, $new_file);

			$files[] = $new_file;
		}

		File::deleteDirectory($zip_destination);			//Delete temporary zip folder

		natcasesort($files);								//Order by natural order
		$files = array_values($files);
		$files = array_map(function ($value) {
			return str_replace(storage_path('manga/'), '', $value);
		}, $files);

		return $files;
	}

	public function duplicateName($destination, $name)
	{
		$fileName = $destination . DIRECTORY_SEPARATOR . $name;

		if (File::exists($fileName)) {
			// Split filename into parts
			$pathInfo = pathinfo($fileName);
			$extension = isset($pathInfo['extension'])?('.'.$pathInfo['extension']):'';

			// Look for a number before the extension; add one if there isn't already
			if (preg_match('/(.*?)(\d+)$/', $pathInfo['filename'], $match)) {
				// Have a number; increment it
				$base = $match[1];
				$number = intVal($match[2]);
			} else {
				// No number; add one
				$base = $pathInfo['filename'];
				$number = 0;
			}

			// Choose a name with an incremented number until a file with that name 
			// doesn't exist
			do {
				$fileName = $destination . DIRECTORY_SEPARATOR . $base . ++$number . $extension;
			} while (File::exists($fileName));
		}

		return $fileName;
	}

	public function duplicateSave($file, $destination, $name) {
		$fileName = $this->duplicateName($destination, $name);

		// Store the file
		$file->move($destination, str_replace($destination, '', $fileName));
		return str_replace(storage_path('manga/'), '', $fileName);
	}

	public function isZip($file) 
	{
		return ($file->getMimeType() == 'application/zip');
	}

	public function savePage($chapter, $files)
	{
		$count_page = $chapter->page;

		DB::beginTransaction();

		try {
			foreach ($files as $index => $page_path) {
				$page = new Page;
				$page->chapter_id = $chapter->id;
				$page->page_num = $index + $count_page + 1;
				$page->path = $page_path;
				$page->save();
			}
		} catch (\Exception $ex) {
			DB::rollback();
		}

		DB::commit();
	}
}
