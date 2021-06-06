<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int)$this->id,
            'image' => $this->image,
            'parent_category' => new CategoryResource($this->category->parent),
            'category' => new CategoryResource($this->category),
            'note' => $this->note,
        ];
    }
}
