<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type_id'   => 'required|integer|exists:partner_types,id',
            'name'      => 'required|string|min:1|max:255',
            'ceo'       => 'required|string|min:1|max:255',
            'email'     => 'required|string|min:1|max:255',
            'phone'     => 'required|string|min:1|max:255',
            'address'   => 'required|string|min:1|max:255',
            'inn'       => 'required|string|min:1|max:255',
            'rating'    => 'required|integer|min:1|max:10',
        ];
    }

    public function messages(): array {
        return [
            'required' => 'Обязательно для заполнения',
            'string' => 'Должно быть строкой',
            'integer' => 'Должно быть целым числом',
            'numeric' => 'Должно быть числом',
            'exists' => 'Должно существовать',
            'min' => 'Минимум :min',
            'max' => 'Максимум :max',
        ];
    }
}
