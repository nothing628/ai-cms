<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Crawl extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'crawl:scan';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Crawl manga sites';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		//
	}
}
