<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    
    //記事表示一覧のメソッド
    public function article(Article $article)
    {
        return view('articles.index')->with(['articles' => $article->getPaginateByLimit()]);
    }
    //記事詳細表示のメソッド
    public function show(Article $article)
    {
        return view('articles.show')->with(['article' => $article]);
    }
}
