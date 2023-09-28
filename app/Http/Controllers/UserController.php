<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\relationship;


class UserController extends Controller
{
    public function index(User $user)
    {
        return $user->get();
    }

    //自分以外のユーザのページ
    public function another(User $user)
    {
        return view('anotherusers.profile')->with(
            [   'user_name' =>$user->name,
                'articles' => $user->getByUser()]);
                
    }
    
    
    //フォロー中のユーザーを取得
    public function follows()
    {
        $users = \Auth::user()->followers()->orderBy('created_at', 'desc')->paginate(3);
        $data = [
            'users' => $users,
        ];
        return view('mypages.follow', $data);
    }
    //フォロワーを取得
     public function followers()
    {
        $users = \Auth::user()->follows()->orderBy('created_at', 'desc')->paginate(50);
        $data = [
            'users' => $users,
        ];
        return view('mypages.follower', $data);
    }
    
}