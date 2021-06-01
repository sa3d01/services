<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiMasterRequest;

class UserRegisterationRequest extends ApiMasterRequest
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
            'type' => 'required|in:USER,PROVIDER',
            'name' => 'required|string|max:110',
            'phone' => 'required|string|max:90|unique:users',
            'password' => 'required|string|min:6|max:15',
            'country_id' => 'nullable|numeric|exists:drop_downs,id',
            'city_id' => 'required|numeric|exists:drop_downs,id',
            'location.lat' => 'nullable',
            'location.lng' => 'nullable',
            'location.address' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'insta' => 'nullable',
            'snap' => 'nullable',
            'marketer_id' => 'nullable',
            'device.id' => 'required',
            'device.os' => 'required|in:android,ios',
        ];
    }
}
