<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function profile(Profile $profile)
    {
        return $profile->get();
    }
}
