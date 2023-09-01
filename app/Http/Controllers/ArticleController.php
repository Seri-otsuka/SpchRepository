<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

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
    //記事作成画面のメソッド
    public function create(Article $article)
    {
        return view('articles.create');
    }
    //記事保存のメソッド
    public function store(Article $article, ArticleRequest $request)
    {
        $input = $request['article'];
        $article->fill($input)->save();
        return redirect('/articles/' . $article->id);
    }
}
