<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 
use App\Models\Profile; 
use App\Http\Controllers\ProfileController;
use App\Http\Requests\ProfileRequest;
use Storage;
use App\Models\User;

class MypageController extends Controller
{
      public function index(Profile $profile)
    {
       // 自分の記事一覧を投稿日降順で取得
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(3);
        $profiles = \Auth::user()->profiles();
        $data = [
            'articles' => $articles,
            'profile' => $profile,
        ];
        return view('mypages.index', $data);
    }
    
}
