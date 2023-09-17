<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Models\Category;
use App\Models\User;


class ArticleController extends Controller
{
    
    //記事表示一覧のメソッド
    public function article(Article $article)
    {
        return view('articles.index')->with(['articles' => $article->getPaginateByLimit(3)]);
    }
    //記事詳細表示のメソッド
    public function show(Article $article)
    {
        return view('articles.show')->with(['article' => $article]);
    }
    //記事保存のメソッド
    public function store(Article $article, ArticleRequest $request)
    {
        $input = $request['article'];
        $article = new Article();
        $article->user_id = \Auth::id();
        $article->fill($input)->save();
        return redirect('/articles/' . $article->id);
    }
    
    //記事編集のメソッド
    public function edit(Article $article)
    {
        $this->authorize($article);
        $data = ['article' => $article];
        return view('articles.edit')->with(['article' => $article]);
    }
    
    //記事編集後投稿のメソッド
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize($article);
        $input_article = $request['article'];
        $article->fill($input_article)->save();
    
        return redirect('/articles/' . $article->id);
    }
    
   public function destroy(Article $article)
   {
       $this->authorize($article);
       $article->delete();
       return redirect('/article');
   }
    public function create(Category $category)
    {
        return view('articles.create')->with(['categories' => $category->get()]);
    }
    
    //いいねした記事を取得する
     public function good_articles()
    {
        $articles = \Auth::user()->good_articles()->orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'articles' => $articles,
        ];
        return view('mypages.good', $data);
    }
    
    
}
