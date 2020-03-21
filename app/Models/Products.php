<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDesignerMeasurements;
use App\Models\ProductComments;
use App\Models\Product_images;

class Products extends Model
{
    protected $table='products';

    public function comments(){
    	return $this->hasMany(ProductComments::class,'product_id')->latest();
    }

    public function images(){
    	return $this->hasMany(Product_images::class,'product_id');
    }
}
