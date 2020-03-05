<?php

namespace App\Models;
use Auth;
use App\Models\Timelinecomments;
use App\Models\Timelinelikes;

trait PostlikableTrait
{
    public function like()
    {
        return $this->morphMany(Timelinelikes::class,'likable')->latest();
    }

    public function addLike($request)
    {

        $like = new Timelinelikes();
        $like->user_id = Auth::user()->id;
        $like->timeline_id = $request->postid;
        $like->ipaddress = $_SERVER['REMOTE_ADDR'];

        $this->like()->save($like);
        return $like;
    }
}
