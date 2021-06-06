<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->header('lang')=='ar'){
            $name=$this->name_ar;
        }else{
            $name=$this->name_en;
        }
        return [
            'id'=> (int)$this->id,
            'name'=> $name,
            'image'=> $this->image,
        ];
    }
}
