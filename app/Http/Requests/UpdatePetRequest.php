<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
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
            'name' => 'required|max:50',
            'species' => 'required|max:50',
            'date_born' => 'required',
            'genre' => 'required|max:100',
            'owner' => 'required|max:50',
            'vaccinations' => 'required|exists:vaccinations,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages(){
        return[
            'required'  => 'Il campo :attribute è obbligatorio.',
            'max'       => 'Il campo :attribute non può superare :max caratteri.',
            'vaccinations.required' => 'Il campo delle vaccinazioni è obbligatorio',
            'vaccinations.exists'   => 'Il campo selezionato non è valido',
            'image.mimes' => 'Il formato dell\'immagine non è valido. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
            'image' => 'Il tipo di file non è consentito. Si prega di caricare un\'immagine in formato JPEG, PNG, JPG, GIF o SVG.',
        ];
    }
}
