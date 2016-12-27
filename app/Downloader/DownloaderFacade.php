<?php

namespace App\Downloader;

use Illuminate\Support\Facades\Facade;

class DownloaderFacade extends Facade
{
	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'manga.download';
    }
}