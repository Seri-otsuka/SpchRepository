<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function article(Article $article)
    {
        return view('articles.index')->with(['articles' => $article->getPaginateByLimit()]);
    }
}
