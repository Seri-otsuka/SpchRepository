<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoritecategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\RelationshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category', [CategoryController::class, 'category']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/article', [ArticleController::class, 'article']);
Route::get('/profile', [ProfileController::class, 'profile']);
Route::get('/favoritecategory', [FavoritecategoryController::class, 'favoritecategory']);
Route::get('/comment', [CommentController::class, 'comment']);
Route::get('/good', [GoodController::class, 'good']);
Route::get('/room', [RoomController::class, 'room']);
Route::get('/message', [MessageController::class, 'message']);
Route::get('/entry', [EntryController::class, 'entry']);
Route::get('/relationship', [RelationshipController::class, 'relationship']);