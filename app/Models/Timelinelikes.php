<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Timeline;

class Timelinelikes extends Model
{
    use PostlikableTrait;

    protected $table = 'timeline_likes';
    protected $fillable = ['user_id','timeline_id','ipaddress'];

    public function likable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(Timeline::class);
    }
}
