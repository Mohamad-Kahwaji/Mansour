<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageUploadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'file', 'mimes:jpeg,png,webp', 'max:10240'],
            'old_path' => ['nullable', 'string', 'max:255'],
        ];
    }
}
