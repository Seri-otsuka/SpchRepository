<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;


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
}