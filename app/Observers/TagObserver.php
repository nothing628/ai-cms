<?php 

namespace App\Observers;
use App\Models\Tag;
use App\Models\Tagged;

class TagObserver {
	public function deleting(Tag $tag)
    {
        $tags = Tagged::where('tag_name', $tag->name)->where('tag_slug', $tag->slug)->get();

        foreach ($tags as $tagged) {
        	$tagged->delete();
        }
    }
}
