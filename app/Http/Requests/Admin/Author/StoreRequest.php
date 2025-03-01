<?php

namespace App\Http\Requests\Admin\Author;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:100',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Это поле обязательно для заполнения.',
            'name.string' => 'Это поле должно быть строкой.',
            'name.min' => 'Это поле должно содержать не менее 3 символов.',
            'name.max' => 'Это поле должно содержать не более 100 символов.',
        ];
    }
}
