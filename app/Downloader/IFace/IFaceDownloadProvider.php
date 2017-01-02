<?php 

namespace App\Downloader\IFace;

interface IFaceDownloadProvider {
	public function scan();
	public function downloadPage($url_page, $destination);
	public function downloadManga($url_manga, $destination);
	public function downloadChapter($url_chapter, $destination);

	public function listChapter($url_manga);
	public function listPage($url_chapter);
}