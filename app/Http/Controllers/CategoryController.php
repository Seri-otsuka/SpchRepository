<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(Category $category)
    {
        return $category->get();
    }
    
    public function index(Category $category)
    {
        return view('categories.index')->with(['articles' => $category->getByCategory()]);
    }
}
