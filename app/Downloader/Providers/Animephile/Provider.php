<?php

namespace App\Downloader\Providers\Animephile;

use App\Downloader\IFace\IFaceDownloadProvider;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Provider implements IFaceDownloadProvider
{
	protected $app;
	protected $client;
	protected $converter;

	const base_uri = "http://www.animephile.com";
	const replace = '/(\d{3})(\.jpg$)/i';

	public function __construct($app)
	{
		$this->app = $app;
		$this->client = new Client();
		$this->converter = new CssSelectorConverter();
	}

	public function scan()
	{
		//
	}

	public function downloadManga($url_manga)
	{
		//
	}

	public function downloadChapter($url_chapter)
	{
		//
	}

	public function downloadPage($url, $dest)
	{
		//
	}

	public function listChapter($url_manga)
	{
		//
	}

	public function listPage($url_chapter)
	{
		$result = [];
		$match = [];
		$response = $this->client->get($url_chapter);
		$code = $response->getStatusCode();
		$replace = self::replace;

		if ($code == "200") {
			$body = $response->getBody();
			$content = $body->getContents();
			$crawl = new Crawler($content);
			$base_image = $crawl->filterXPath($this->converter->toXPath("#mainimage"))->attr('src');
			$each = $crawl->filterXPath($this->converter->toXPath(".selectmpg > option"))
				->each(function (Crawler $node, $i) use ($base_image, $replace) {
					$num = (int) $node->text();
					$page = sprintf("%03d", $num);
					return preg_replace($replace, $page.'$2', $base_image);
				});
			$result = $each;
		}

		return $result;
	}
}