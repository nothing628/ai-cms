<?php 

namespace App\Downloader;

class Downloader {

	protected $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function getInstance($provider)
	{
		$class_provider = __NAMESPACE__."\\Providers\\" . $provider . "\\Provider";
		$instance = new $class_provider($this->app);

		return $instance;
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

	public function downloadPage($url, $dest, $provider)
	{
		$instance = $this->getInstance($provider);

		return $instance->downloadPage($url, $dest);
	}

	public function listPage($url_chapter, $provider)
	{
		$instance = $this->getInstance($provider);

		return $instance->listPage($url_chapter);
	}
}