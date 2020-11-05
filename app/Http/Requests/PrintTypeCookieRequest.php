<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrintTypeCookieRequest extends FormRequest
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
            'answers' => 'required',
            'print_type' => 'required',
            'shippingOption' => 'required',
            'bagAndTag' => 'required',
        ];
    }
    public function messages()
    {
    return [
        // 'faqIds.required' => 'Kindly Answer Required Fields',
        'answers.required' => 'Kindly Fill Print Type Related Fields',
    ];
    }
}
