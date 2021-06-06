<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DropDownCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $data = [];
        foreach ($this as $obj) {
            $arr['id'] = (int)$obj->id;
            if ($request->header('lang')=='ar'){
                $arr['name']=$obj->name_ar;
            }else{
                $arr['name']=$obj->name_en;
            }
            $data[] = $arr;
        }
        return $data;
    }
}
