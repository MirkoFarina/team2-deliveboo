<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:45', 'required'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'surname' => ['string', 'max:45', 'required'],
            'address' => ['string', 'max:255', 'required'],
            'phone_number' => ['string', 'max:12', 'required'],
            'password' => ['string', 'max:255', 'min:8', 'required'],
        ];
    }

    public function messages(){
        return [
            'name.max' => 'Il nome può contenere al massimo :max caratteri',
            'name.required' => 'Il nome è un campo obbligatorio',

            'surname.max' => 'Il cognome può contenere al massimo :max caratteri',
            'surname.required' => 'Il cognome è un campo obbligatorio',

            'address.max' => 'L\'indirizzo può contenere al massimo :max caratteri',
            'address.required' => 'L\'indirizzo è un campo obbligatorio',

            'phone_number.max' => 'Il numero di telefono può contenere al massimo :max caratteri',
            'phone_number.required' => 'Il numero di telefono è un campo obbligatorio',

            'password.max' => 'La password può contenere al massimo :max caratteri',
            'password.min' => 'La password deve contenere almeno :min caratteri',
            'password.required' => 'La password è un campo obbligatorio',

            'email.email' => 'L\'email non è formattata correttamente',
            'email.max' => 'L\'email può contenere al massimo :max caratteri',

        ];

    }
}
