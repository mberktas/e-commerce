<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Carts extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'status' => $this->status,
            'address' => $this->address,
            'totalAmount' => $this->total_amount,
            'customer_id' => $this->customer_id,

        ];
    }
}
