<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    protected $fillable = [
        'cart_id',
        'price',
        'product_id',
    ];

    public function product(){
        //return $this->hasMany('App\Product', 'id', 'product_id'); // sonra eklendi
        return $this->belongsTo('App\Product','product_id','id'); /// düzenlenecek

    }

    }

