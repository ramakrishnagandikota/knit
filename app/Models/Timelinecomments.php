<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;
use App\Traits\PostCommentableTrait;

class Timelinecomments extends Model
{
	use PostCommentableTrait;

    protected $fillable = ['user_id','timeline_id','comment','created_at','ipaddress'];
    protected $table = 'timeline_comments';

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(Timeline::class);
    }

    function timeline(){
        $this->belongsTo(Timeline::class);
    }
}
