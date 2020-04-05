<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'status',
        'total_amount',
        'address'
    ];

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id','id'); /// düzenlenecek

    }
}
