<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'name_of_restaurant' => 'required|max:75',
            'p_iva' => 'required|max:11',
            'address' => 'required',
            'phone_number' => 'required|max:12|numeric',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_of_restaurant.required' => 'Il nome del ristorante è un campo obbligatorio',
            'name_of_restaurant.max' => 'Il nome del ristorante può contenere al massimo :max caratteri',

            'p_iva.required' => 'La partita IVA è un campo obbligatorio',
            'p_iva.max' => 'La partita IVA può contenere al massimo :max caratteri',
            'p_iva.numeric' => 'La formattazione della partita IVA è errata (inserire soltanto cifre)',

            'address.required' => 'l\'indirizzo è un campo obbligatorio',

            'phone_number.required' => 'Il numero di telefono è un campo obbligatorio',
            'phone_number.max' => 'Il numero di telefono può contenere al massimo :max caratteri',

            'email.required' => 'l\'email è un campo obbligatorio',
        ];
    }
}
