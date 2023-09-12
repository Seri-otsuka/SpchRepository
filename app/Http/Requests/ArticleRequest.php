<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'article.title' => 'required|string|max:70',
            'article.text' => 'required|string|max:2000',
        ];
    }
}
