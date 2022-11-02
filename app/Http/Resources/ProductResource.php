<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'category' => new CategoryResource($this->category) ,
            'description' => $this->description,
            'short_description' => $this->short_description,
            'price' => $this->price,
            'SKU' => $this->SKU,
            'in_stock' => $this->in_stock,
            'discount' => $this->discount
        ];
    }
}
