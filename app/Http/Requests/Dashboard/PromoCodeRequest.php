<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PromoCodeRequest extends FormRequest
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
            'discount_percent' => 'required',
            'code' => 'required|string|max:110',
            'count_of_uses' => 'required',
            'end_date' => 'required|after:today|date_format:m/d/Y',
        ];
    }

}
