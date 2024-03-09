<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlbumValidator extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:240',
            'pictures' => $this->album_id ? 'nullable' : 'required' . '|array',
            'pictures.*' => 'image'
        ];
    }
}
