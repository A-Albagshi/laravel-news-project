<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use \UniSharp\LaravelFilemanager\Lfm;
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

// For FileManager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});

// Route::get('/', );

Route::get('/dashboard', function () {
    return view('dashboard', [
        'category' => Category::newsCount(),
        'comments' => Comment::countComments(),
    ]);
})->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard')->group(function () {
    Route::resource('news', NewsController::class, ['except' => ['index', 'show']]);
    Route::get('/news/{news:slug}/edit', [NewsController::class, 'edit']);
    Route::resource('comments', CommentController::class, ['except' => ['index', 'show', 'create']]);
});

Route::get('/', [NewsController::class, 'index'])->name('news');
Route::get('news/{news:slug}', [NewsController::class, 'show'])->name('news.show');


require __DIR__ . '/auth.php';

Route::prefix('news')->group(function(){
    Route::post('{news:slug}/comments', [CommentController::class, 'store'])->name('news.comments.store');
});


Route::get('news', [NewsController::class, 'index'])->name('news');
