<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedBackResource extends JsonResource
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
            'id' => (int)$this->id,
            'rate' => (double)$this->rate,
            'feedback' => $this->feedback,
            'user' => [
                'id'=>$this->user->id,
                'name'=>$this->user->name,
                'image'=>$this->user->image
            ],
        ];
    }
}
