<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDesignerMeasurements;
use App\Models\ProductComments;

class Products extends Model
{
    protected $table='products';

    public function commentsRating(){
    	return $this->hasMany('App\Models\ProductComments','product_id');
    }
}
