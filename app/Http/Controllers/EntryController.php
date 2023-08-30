<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    public function entry(Entry $entry)
    {
        return $entry->get();
    }
}
