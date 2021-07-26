<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
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


Route::get('/dashboard', function () {
    return view('dashboard', [
        'category' => Category::newsCount(),
        'comments' => Comment::countComments(),
    ]);
})->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('news', NewsController::class, ['except' => ['index', 'show']]);
    Route::get('/news/{news:slug}/edit', [NewsController::class, 'edit'])->name('dashboard.news.edit');
    Route::resource('comments', CommentController::class, ['except' => ['show', 'create']]);
    Route::get('/news', function () {
        return view('dashboard-news', ['news' => News::with('category', 'author', 'comments')->latest()->paginate(10)]);
    })->name('dashboard.news');
});

Route::get('/', [NewsController::class, 'index'])->name('news');
Route::get('news/{news:slug}', [NewsController::class, 'show'])->name('news.show');

Route::post('news/{news:slug}/comments', [CommentController::class, 'store'])->name('news.comments.store');


Route::get('allnews', [NewsController::class, 'allNews'])->name('allnews');

require __DIR__ . '/auth.php';