<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\CommentController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::post('/articles/{article}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::get('/introductions', function () {
    return view('introductions.index');})->name('introduction');
    
Route::get('/', function () {
    return view('toppages.index');})->name('toppage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/article', [ArticleController::class, 'article'])->name('article');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    Route::resource('/articles', ArticleController::class);
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');
    Route::get('/article', [ArticleController::class, 'article'])->name('article');
    Route::get('/articles/create', [ArticleController::class, 'create']);
    Route::post('/articles', [ArticleController::class, 'store']);
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
    Route::put('/articles/{article}', [ArticleController::class, 'update']);
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy']);
    Route::get('/categories/{category}', [CategoryController::class,'index']);
    Route::get('/users/{user}', [UserController::class,'another']);
    Route::post('/articles/{article}/good', [GoodController::class, 'store'])->name('good.store');
    Route::delete('/articles/{article}/ungood', [GoodController::class, 'destroy'])->name('good.destroy');
    Route::get('/goods', [ArticleController::class, 'good_articles'])->name('goods');
    Route::post('/articles/{user}/relationship', [RelationshipController::class, 'store'])->name('relationship.store');
    Route::delete('/articles/{user}/unrelationship', [RelationshipController::class, 'destroy'])->name('relationship.destroy');
    Route::get('/follows', [UserController::class, 'follows'])->name('follows');
    Route::get('/followers', [UserController::class, 'followers'])->name('followers');
    Route::get('/profiles/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/mypage', [MypageController::class, 'store'])->name('profile.store');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';