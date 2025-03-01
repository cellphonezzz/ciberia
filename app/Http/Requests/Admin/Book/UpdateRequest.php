<?php

namespace App\Http\Requests\Admin\Book;

use App\Enums\BookTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'author_id' => 'required|integer|exists:authors,id',
            'genre_ids' => 'nullable|array',
            'genre_ids.*' => 'integer|nullable|exists:genres,id',
            'type' => ['required', new Enum(BookTypeEnum::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения.',
            'title.string' => 'Это поле должно быть строкой.',
            'title.min' => 'Это поле должно содержать не менее 3 символов.',
            'title.max' => 'Это поле должно содержать не более 100 символов.',
        ];
    }
}
