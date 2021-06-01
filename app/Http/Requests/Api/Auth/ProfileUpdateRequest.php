<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiMasterRequest;

class ProfileUpdateRequest extends ApiMasterRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string|max:110',
            'phone' => 'nullable|string|max:90|unique:users,phone,' . \request()->user()->id,
            'city_id' => 'nullable|numeric|exists:drop_downs,id',
            'country_id' => 'nullable|numeric|exists:drop_downs,id',
            'device.id' => 'required',
            'device.os' => 'required|in:android,ios',
            'location.lat' => 'nullable',
            'location.lng' => 'nullable',
            'location.address' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'insta' => 'nullable',
            'snap' => 'nullable',
        ];
    }
}
