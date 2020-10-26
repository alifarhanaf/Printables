<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'images' => 'required|array|nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required',
            'sizes' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'groups_id' => 'required',
            'categories_id' => 'required',
            'printLocation_ids'=>'required',

        ];
    }
}
