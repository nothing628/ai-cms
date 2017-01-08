<?php

namespace App\Downloader\Providers\Animephile;

use App\Downloader\IFace\IFaceDownloadProvider;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\CssSelector\CssSelectorConverter;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class Provider implements IFaceDownloadProvider
{
	protected $app;
	protected $client;
	protected $converter;

	const base_uri = "http://www.animephile.com";
	const type2_prefix = self::base_uri . "/gallery/";
	const type2_replace = '/\?lzkfile=(.+jpg)/i';
	const replace = '/(\d{3})(\.jpg$)/i';

	public function __construct($app)
	{
		$this->app = $app;
		$this->client = new Client();
		$this->converter = new CssSelectorConverter();
	}

	public function downloadRegex($url, $fname, $page_num)
	{
		try {
			$request = new Request('GET', $url);
			$response = $this->client->send($request, ['query' => ['ch' => 'Volume 01', 'mpg' => $page_num]]);

			if ($response->getStatusCode() == 200) {
				$body = $response->getBody();
				$content = $body->getContents();
				$crawl = new Crawler($content);
				$base_image = $crawl->filterXPath($this->converter->toXPath("#mainimage"))->attr('src');

				$request = new Request('GET', $base_image);
				$response = $this->client->send($request, ['sink' => $fname]);

				if ($response->getStatusCode() == 200) {
					//
				}
			}
		} catch (RequestException $ex) {
			return false;
		}

		return true;
	}

	public function scan()
	{
		//
	}

	public function downloadImg($url, $destination)
	{
		//
	}

	public function downloadManga($url_manga, $destination)
	{
		//
	}

	public function downloadChapter($url_chapter, $destination)
	{
		//
	}

	public function downloadPage($url, $destination)
	{
		$listPage = $this->listPage($url);
		$result = [];
		$storage = storage_path('manga'). '/' . $destination;

		try {
			$file = $this->app['files'];

			if (! $file->exists($storage)) {
				$file->makeDirectory($storage, 493, true, false);
			}
		} catch (Exception $ex) {
			return $result;
		}

		foreach ($listPage['pages'] as $idx => $page) {

			try {
				$fname = ($idx + 1) . '.' . $this->getFormat($page);
				$request = new Request('GET', $page);
				$response = $this->client->send($request, ['sink' => $storage . '/' . $fname]);

				if ($response->getStatusCode() == 200) {
					$result[$page] = $storage . '/' . $fname;
				}
			} catch (RequestException $ex) {
				if ($this->downloadRegex($url, $storage . '/' . $fname, $idx + 1)) {
					$result[$page] = $storage . '/' . $fname;
				} else {
					$result[$page] = $ex->getMessage();
				}
			}

		}

		return $result;
	}

	public function getPreg($url)
	{
		$match = [
			'',
			'',
			''
		];
		$pgr = '/([^\/]+)\.([a-z]{3})$/i';
		$out = preg_match($pgr, $url, $match);

		return $match;
	}

	public function getFormat($url)
	{
		$match = $this->getPreg($url);

		return $match[2];
	}

	public function getFname($url)
	{
		$match = $this->getPreg($url);

		return $match[0];
	}

	public function listChapter($url_manga)
	{
		//
	}

	public function listPage($url_chapter)
	{
		$type2_prefix = self::type2_prefix;
		$type2_replace = self::type2_replace;
		$replace = self::replace;
		$result = [];
		$match = [];
		$manga_name = "";
		$response = $this->client->get($url_chapter);
		$code = $response->getStatusCode();

		if ($code == "200") {
			$body = $response->getBody();
			$content = $body->getContents();
			$crawl = new Crawler($content);
			
			try {
				$test = $crawl->filterXPath($this->converter->toXPath("#mainimage"));

				if ($test->count() != 0) {
					//filter type 1
					$base_image = $crawl->filterXPath($this->converter->toXPath("#mainimage"))->attr('src');
					$manga_name = $crawl->filterXPath($this->converter->toXPath("#singlenav > .selected"))->html();

					$each = $crawl->filterXPath($this->converter->toXPath(".selectmpg > option"))
						->each(function (Crawler $node, $i) use ($base_image, $replace) {
							$num = (int) $node->text();
							$page = sprintf("%03d", $num);
							return preg_replace($replace, $page.'$2', $base_image);
						});
				} else {
					$each = $crawl->filterXPath($this->converter->toXPath("#gallery > .thumbs a"))
						->each(function (Crawler $node, $i) use ($type2_prefix, $type2_replace) {
							$page = $node->attr('href');
							$page = str_replace('+', ' ', $page);
							$page = str_replace('%2F', '/', $page);
							$match = [];
							$out = preg_match($type2_replace, $page, $match);

							if ($out == 1) {
								return $type2_prefix . $match[1];
							} else {
								return '';
							}
						});
				}

				$result = $each;
			} catch (Exception $ex) {
				//
			}
			
		}

		return ['pages' => $result, 'manga_name' => $manga_name];
	}
}