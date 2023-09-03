<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
             'user.name' => 'required|string|min:8|max:12',
             'user.password' => 'required|string|min:8|max:12',
             'user.mail' => 'required|string|max:256',
        ];
    }
}
