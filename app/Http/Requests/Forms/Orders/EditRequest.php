<?php

declare(strict_types=1);

namespace App\Http\Requests\Forms\Orders;

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
            'username' => ['required', 'string', 'min:2', 'max:200'],
            'userphone' => ['sometimes'],
            'usermail' => ['required', 'string', 'min:5', 'max:200'],
            'orderinfo' => ['requires', 'string', 'min:5'],
        ];
    }
}
