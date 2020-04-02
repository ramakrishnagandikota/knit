<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Todo extends Model
{
    protected $table = 'todo';

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
