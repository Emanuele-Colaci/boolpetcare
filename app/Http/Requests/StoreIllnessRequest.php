<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIllnessRequest extends FormRequest
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
            'name' => 'required|max:30',
            'diagnosis' =>  'required',
            'treatment' =>  'required',
            'notes'     =>  'required|max:300'
        ];
    }

    public function messages(){
        return[
            'name.required'         => 'Il nome è obbligatorio',
            'name.max'              => 'Il nome deve essere composto da un massimo di :max caratteri',
            'diagnosis.required'    => 'La diagnosi è obbligatoria',
            'treatment.required'    => 'Il trattamento è obbligatorio',
            'notes.required'        => 'Il campo delle note è obbligatorio',
            'notes.max'             => 'Il campo delle note deve essere composto da un massimo di :max caratteri'
        ];
    }
}
