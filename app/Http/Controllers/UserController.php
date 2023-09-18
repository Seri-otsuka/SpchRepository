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


    public function another(User $user)
    {
        return view('anotherusers.profile')->with(
            [   'user_name' =>$user->name,
                'articles' => $user->getByUser()]);
                
    }
    
    /*
    public function relationship_users()
    {
        $users = \Auth::user()->relationship_users()->orderBy('created_at', 'desc');
        $data = [
            'users' => $users,
        ];
        return view('articles.bookmarks', $data);
    }
    */
}