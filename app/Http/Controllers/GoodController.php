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
}
