<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'name'        =>  'required|max:75',
            'price'       =>  'required|numeric|between:0,999.99',
            'cover_image' =>  'max:5120',
            'ingredients' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Il nome è un campo obbligatorio',
            'name.max'              => 'Inserisci un nome che non superi :max caratteri',

            'price.required'        => 'Il prezzo è un campo obbligatorio',
            'price.numeric'         => 'Inserisci un numero',
            'price.between'         => 'Inserisci un numero compreso tra :min e :max',

            'cover_image.max'       => 'Scegli un immagine più piccola',

            'ingredients.required'  => 'Gli ingredienti sono un campo obbligatorio'
        ];
    }
}
