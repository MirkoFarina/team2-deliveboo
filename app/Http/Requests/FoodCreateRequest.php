<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodCreateRequest extends FormRequest
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
            'price'       =>  'required|numeric|size:999.99',
            'cover_image' =>  'required|max:5120',
            'ingredients' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Il nome è un campo obbligatorio',
            'name.max'              => 'Inserisci un nome più corto',
            'price.required'        => 'Il prezzo è un campo obbligatorio',
            'price.max'             => 'Inserisci un prezzo più piccolo',
            'price.numeric'         => 'Inserisci un numero',
            'price.size'            => 'Inserisci un numero compreso tra 0 e 999.99',
            'cover_image.required'  => 'L\'immagine è un campo obbligatorio',
            'cover_image.max'       => 'Scegli un immagine più piccola',
            'ingredients.required'  => 'Gli ingredienti sono un campo obbligatorio'
        ];
    }
}
