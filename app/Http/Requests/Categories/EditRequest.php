<?php

declare(strict_types=1);

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            // 'news_ids' => ['required', 'array'],
            // 'news_ids.*' => ['exists:news,id'],
            'title' => ['required', 'string', 'min:5', 'max:200'],
            'slug' => ['required', 'string', 'min:2', 'max:200'],
            'image' => ['sometimes'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function getNewsIds(): array
    {
        return (array) ($this->validated('news_ids'));
    }
}
