<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidatorRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [

            'name' => 'required|max:240',
            'phone' => 'required|max:240|unique:users,phone',
            'email' => 'required|max:240|unique:users,email',
            'password' => 'required|min:8|confirmed'
            
        ];
    }
}
