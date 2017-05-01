<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use DB;

class PageController extends Controller
{
	public function getPages($chapter_id, Request $request)
	{
		$pages = Page::where('chapter_id', $chapter_id)->get();

		return response()->json(['success' => true, 'data' => $pages]);
	}

	public function move(Request $request)
	{
		$move_order = $request->input('move_order');
		$pages = Page::where('chapter_id', $request->input('chapter_id'))->get();
		$cpage = $pages->where('page_num', $request->input('page_num'))->first();
		$bpage = $pages->where('page_num', $cpage->page_num + $move_order)->first();

		if ($cpage && $bpage) {
			$bpage->page_num -= $move_order;
			$cpage->page_num += $move_order;

			$bpage->save();
			$cpage->save();

			return response()->json(['success' => true, 'message' => '']);
		}

		return response()->json(['success' => false, 'message' => 'Page Not Found', 'data' => $request->all()]);
	}

	public function delete(Request $request)
	{
		$success = true;
		$chapter_id = $request->input('chapter_id');
		$pages = Page::where('chapter_id', $chapter_id)->get();

		DB::beginTransaction();

		if ($request->has('page_nums')) {
			foreach ($request->input('page_nums') as $page_num) {
				$page = $pages->where('page_num', $page_num)->first();

				if ($page) {
					try {
						$page->delete();
					} catch (\Exception $ex) {
						DB::rollback();
					}
				} else {
					$success = false;
				}
			}
		} else {
			$page = $pages->where('page_num', $request->input('page_num'))->first();

			if ($page) {
				try {
					$page->delete();
				} catch (\Exception $ex) {
					DB::rollback();
				}
			} else {
				$success = false;
			}
		}

		DB::commit();
		$this->reorderPage($chapter_id);

		return response()->json(['success' => $success]);
	}

	public function reorderPage($chapter_id)
	{
		$i = 1;
		$pages = Page::where('chapter_id', $chapter_id)->orderBy('page_num')->get();

		DB::beginTransaction();

		try {
			foreach ($pages as $page) {
				if ($page->page_num != $i) {
					$page->page_num = $i;
					$page->save();
				}

				$i++;
			}
		} catch (\Exception $ex) {
			DB::rollback();
		}

		DB::commit();
	}
}
