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
    
    
    public function follows(Relationship $relationship)
    {
        $relationships = \Auth::user()->follows()->get();
        $data = [
            'relationships' => relationships,
        ];
        return view('mypages.follow', $data);
    }
    
    public function follower_users(User $user)
    {
        $users = \Auth::user()->relationship_users()->orderBy('created_at', 'desc');
        $data = [
            'users' => $users,
        ];
        return view('mypages.follower', $data);
    }
    
}