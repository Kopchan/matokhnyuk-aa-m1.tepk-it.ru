<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        // Правила валидации
        return [
            'product_type_id' => 'required|integer|exists:product_types,id',
            'name'            => 'required|string|min:1|max:255',
            'article'         => 'required|string|min:1|max:255',
            'minPrice'        => 'required|numeric|min:0',
            'width'           => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        // Изменения стандартных сообщений об ошибках на русские
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
