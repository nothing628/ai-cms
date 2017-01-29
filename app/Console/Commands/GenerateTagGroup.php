<?php

namespace App\Console\Commands;

use App\Contracts\TaggingUtility;
use App\Models\TagGroup;
use Illuminate\Console\Command;

class GenerateTagGroup extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'tagging:create-group {group_name}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a laravel tag group';
	protected $taggingUtility;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(TaggingUtility $taggingUtility)
	{
		parent::__construct();
		$this->taggingUtility = $taggingUtility;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$group_name = $this->argument('group_name');
		$tag_group = new TagGroup();
		$tag_group->name = $group_name;
		$tag_group->slug = $this->taggingUtility->slug($group_name);
		$tag_group->save();
		$this->info('Created tag group: ' . $group_name);
	}
}
