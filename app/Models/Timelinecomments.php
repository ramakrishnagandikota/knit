<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;

class Timelinecomments extends Model
{
	use CommentableTrait;

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
}
