<?php

namespace App\Http\Resources;

use App\Models\Social;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleProviderResource extends JsonResource
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
            'rating' => (double)$this->averageRate(),
            'name' => $this->name,
            'phone' => $this->phone ?? "",
            'image' => $this->image,
            'city' => new DropDownResource($this->city),
            'socials' => [
                'facebook' => Social::where('user_id', $this->id)->value('facebook') ?? "",
                'twitter' => Social::where('user_id', $this->id)->value('twitter') ?? "",
                'insta' => Social::where('user_id', $this->id)->value('insta') ?? "",
                'snap' => Social::where('user_id', $this->id)->value('snap') ?? "",
            ],
        ];
    }
}
