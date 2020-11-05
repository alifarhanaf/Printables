<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignSubmitRequest extends FormRequest
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
            'addressName' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'addressLine1' => 'required',
            'addressLine2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
            'savePreference' => 'required',
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
