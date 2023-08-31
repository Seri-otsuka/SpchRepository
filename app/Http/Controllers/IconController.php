<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Icon;

class IconController extends Controller
{
    public function icon(Icon $icon)
    {
        return $icon->get();
    }
}
