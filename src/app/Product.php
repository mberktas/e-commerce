<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand',
        'category_id',
        'status',
        'price',
        'stock',
        'description',
        'photo',
        'gender'
    ];

    public function cartItem(){
        return $this->hasMany('App\Cart_item','product_id');
    }
}
