<?php

namespace App\Http\Requests\Api\Provider;

use App\Http\Requests\Api\ApiMasterRequest;

class GalleryUpdateRequest extends ApiMasterRequest
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
            'category_id' => 'nullable|numeric|exists:categories,id',
            'image' => 'nullable|image',
            'note' => 'nullable|string',
        ];
    }
}
