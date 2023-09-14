<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;


class GoodController extends Controller
{
    public function good(Good $good)
    {
        return $good->get();
    }
    
    //いいね登録
      public function store($articleId) {
        $user = \Auth::user();
        if (!$user->is_good($articleId)) {
            $user->good_articles()->attach($articleId);
        }
        return back();
    }
    
    //いいね解除
    public function destroy($articleId) {
        $user = \Auth::user();
        if ($user->is_good($articleId)) {
            $user->good_articles()->detach($articleId);
        }
        return back();
    }
}
