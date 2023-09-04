<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'email'  => 'required|email',
            'content' => 'required'
        ];
    }
    public function messages(){
        return[
            'name.required'  => 'Il campo nome e il congnome è obbligatorio.',
            'email.required'       => 'Il campo email è obbligatorio.',
            'email.email'       => 'Questa non è un email.',
            'content.required'       => 'Il campo messaggio è obbligatorio.'
        ];
    }
}