<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required|max:15000',
            'user_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'prefecture_id' => 'required|numeric',
            'buy_id' => 'required|numeric',
            'address' => 'required|max:10',
            'price' => 'required|numeric',
            'image' => 'nullable|image'
        ];
    }
}
