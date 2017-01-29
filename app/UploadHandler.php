<?php 

namespace App;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;

class UploadHandler extends AbstractHandler {

	protected $chunkNumber = 0;
	protected $chunkTotal = 0;
	protected $chunkTotalSize = 0;

	/**
	 * AbstractReceiver constructor.
	 *
	 * @param Request        $request
	 * @param UploadedFile   $file
	 * @param AbstractConfig $config
	 */
	public function __construct(Request $request, UploadedFile $file, $config)
	{
		parent::__construct($request, $file, $config);

		$this->chunkNumber = intval($request->input('resumableChunkNumber'));
		$this->chunkTotal = intval($request->input('resumableTotalChunks'));
		$this->chunkTotalSize = intval($request->input('resumableTotalSize'));
	}

	/**
	 * Checks if the current abstract handler can be used via HandlerFactory
	 *
	 * @param Request $request
	 *
	 * @return bool
	 */
	public static function canBeUsedForRequest(Request $request)
	{
		return $request->has('resumableChunkNumber') && $request->has('resumableTotalChunks');
	}

	/**
	 * Returns the chunk file name. Uses the original client name and the total bytes
	 *
	 * @return string returns the original name with the part extension
	 *
	 * @see createChunkFileName()
	 */
	public function getChunkFileName()
	{
		return $this->createChunkFileName($this->chunkTotalSize);
	}

	/**
	 * Returns the first chunk
	 * @return bool
	 */
	public function isFirstChunk()
	{
		return $this->chunkNumber == 1;
	}

	/**
	 * Returns the chunks count
	 *
	 * @return int
	 */
	public function isLastChunk()
	{
		return $this->chunkNumber == $this->chunkTotal;
	}

	/**
	 * Returns the current chunk index
	 *
	 * @return bool
	 */
	public function isChunkedUpload()
	{
		return $this->chunkTotal > 1;
	}

	/**
	 * @return int
	 */
	public function getPercentageDone()
	{
		return ceil($this->chunkNumber / $this->chunkTotal * 100);
	}

	public function getCurrentChunk()
	{
		return $this->chunkNumber;
	}
}
