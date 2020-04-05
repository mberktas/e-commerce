<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Products extends JsonResource
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
            'brand' => $this->brand,
            'description' => $this->description,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'stock' => $this->stock,
            'status' => $this->status,
        
        ];
    }
}
