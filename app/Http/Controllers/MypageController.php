<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 

class MypageController extends Controller
{
      public function index()
    {
       // 自分の記事一覧を投稿日降順で取得
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'articles' => $articles,
        ];
        return view('mypages.index', $data);
    }
    
}