<?php 

namespace App\Downloader\IFace;

interface IFaceDownloadProvider {
	public function scan();
	public function downloadPage($url_page);
	public function downloadManga($url_manga);
	public function downloadChapter($url_chapter);

	public function listChapter($url_manga);
	public function listPage($url_chapter);
}