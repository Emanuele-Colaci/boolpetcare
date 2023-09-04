<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaccinationRequest extends FormRequest
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
            'vaccine_name' => 'required|string|max:255',
            'vaccination_date' => 'required|date',
            'dosage' => 'required|numeric|min:0.1|max:10',
            'notes' => 'nullable|string',
        ];
    }

    public function messages(){
        return[
            'vaccine_name.required' => 'Il nome del vaccino è obbligatorio.',
            'vaccination_date.required' => 'La data della vaccinazione è obbligatoria.',
            'dosage.required' => 'Il dosaggio è obbligatorio.',
            'dosage.min' => 'Il dosaggio deve essere almeno :min.',
            'dosage.max' => 'Il dosaggio non può essere superiore a :max.',
        ];
    }
}
