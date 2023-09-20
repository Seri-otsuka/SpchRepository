<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'profile.text' => 'required|string|max:100',
            'image' => 'image|max:225',
        ];
    }
}
