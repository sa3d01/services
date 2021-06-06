<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> (int)$this->id,
            'price'=> $this->price,
            'parent_category'=>new CategoryResource($this->category->parent),
            'category'=>new CategoryResource($this->category),
            'note'=> $this->note,
        ];
    }
}
