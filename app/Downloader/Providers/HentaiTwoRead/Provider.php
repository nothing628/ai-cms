<?php 

namespace App\Downloader\Providers\HentaiTwoRead;

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

	const base_uri = "http://static.hentaicdn.com/hentai";

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

	public function downloadPage($url_page, $destination)
	{
		$listPage = $this->listPage($url_page);
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
				$result[$page] = $ex->getMessage();
			}

		}

		return $result;
	}

	public function downloadManga($url_manga, $destination)
	{
		//
	}

	public function downloadChapter($url_chapter, $destination)
	{
		//
	}

	public function listChapter($url_manga)
	{
		//
	}

	public function listPage($url_chapter)
	{
		$response = $this->client->get($url_chapter);
		$code = $response->getStatusCode();
		$base = self::base_uri;
		$array_data = ['manga_name' => '', 'pages' => []];

		if ($code == "200") {
			$body = $response->getBody();
			$content = $body->getContents();
			$crawl = new Crawler($content);
			$test = $crawl->filter('script');
			$catch = null;

			$catch = array_values(array_filter($test->each(function (Crawler $craw) {
				$html = $craw->html();

				if (stripos($html, 'rff_imageList')) {
					return $html;
				}
			})));

			$explod = explode("\n", $catch[0]);
			$explod = array_filter(array_map(function ($val) {
				if (stripos($val, 'rff_pageTitle') || stripos($val, 'rff_imageList')) {
					return trim($val, " \t\n\r\0\x0B");
				}

				return null;
			}, $explod));

			foreach ($explod as $value) {
				$dat = explode('=', $value);
				$trimmed_dat = trim($dat[1]);

				if (stripos($dat[0], 'rff_imageList')) {
					$arr_img = json_decode(substr($trimmed_dat, 0, strlen($trimmed_dat) -1));
					$arr_img = array_map(function ($val) use ($base) { return $base . $val; }, $arr_img);
					$array_data['pages'] = $arr_img;
				} else {
					$trimmed_dat = substr($trimmed_dat, 1, strlen($trimmed_dat) -3);
					$array_data['manga_name'] = str_ireplace('Page {pageNum} | ', '', $trimmed_dat);
				}
			}
		}

		return $array_data;
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
}
