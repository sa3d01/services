<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DropDownResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $name['ar']=$this->name_ar;
        $name['en']=$this->name_en;
        return [
            'id'=> (int)$this->id,
            'name'=> $name,
        ];
    }
}
