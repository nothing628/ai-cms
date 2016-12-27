<?php 

namespace App\Downloader;

class Downloader {

	protected $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function updateDatabase($provider)
	{
		//
	}

	public function downloadManga($url, $provider)
	{
		//
	}

	public function downloadChapter($url, $provider)
	{
		//
	}

	public function downloadPage($url, $page_num, $dest, $provider)
	{
		//
	}

	public function listPage($url_chapter, $provider)
	{
		$class_provider = __NAMESPACE__."\\Providers\\" . $provider . "\\Provider";
		$instance = new $class_provider($this->app);
		return $instance->listPage($url_chapter);
	}
}