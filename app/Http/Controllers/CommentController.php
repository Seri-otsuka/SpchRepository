<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Article;


class CommentController extends Controller
{
    //コメント投稿
    public function store(Request $request,Article $article)
    {
        $input = $request['comment'];
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->article_id = $article->id;
        $comment->text = $request->text;
        $comment->save();
        return redirect()->route('article.show',$article);
    }
    
    
    

}
