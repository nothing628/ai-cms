<?php

use Illuminate\Database\Seeder;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\Page;

class MangaSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$manga = new Manga();
		$manga->user_id = 1;
		$manga->title = "Just Test";
		$manga->cover = "Test/Page-01.jpg";
		$manga->save();

		$chapter = new Chapter();
		$chapter->chapter_title = "CH01";
		$chapter->chapter_num = 1;
		$chapter->cover = "Test/Page-01.jpg";
		$chapter->manga()->associate($manga);
		$chapter->save();

		for ($i=1; $i <= 20; $i++) { 
			$page = new Page();
			$page->page_num = $i;
			$page->path = "Test/Page-".sprintf('%02d', $i).".jpg";
			$page->chapter()->associate($chapter);
			$page->save();
		}
	}
}
