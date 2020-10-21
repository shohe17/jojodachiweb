<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Routing\Route;

//Method Illuminate\Routing\Route::get does not exist.
//下のuseをコメントアウトしたら表示できた。useで別のものを指定したら画面表示ができないか
// use Illuminate\Routing\Route;

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
//確認ログイン承認を求める機能の実装？
Route::group(['middleware' => 'auth'], function(){

  Route::get('/', [PostController::class, 'index'])->name('posts.index');

  Route::get('posts/create', [PostController::class, 'showCreateForm'])->name('posts.create');
  Route::post('posts/create', [PostController::class, 'create']);

  //editのルーティング、ページ移動
  Route::get('posts/{id}/edit', [PostController::class, 'showEditForm'])->name('posts.edit');
  //editのルーティング、データ送信
  Route::post('posts/{id}/edit', [PostController::class, 'edit']);

  //deleteのルーティング、データ送信
  Route::post('posts/delete/{id}', [PostController::class, 'delete']);

  //mypageのルーティング
  Route::get('posts/mypage', [PostController::class, 'ShowMypageForm'])->name('posts.mypage');

  //like機能
  Route::get('posts/like/{id}', [PostController::class, 'like'])->name('post.like');
  Route::get('posts/unlike/{id}', [PostController::class, 'unlike'])->name('post.unlike');
  //検索機能
  Route::post('posts/search', [PostController::class, 'search'])->name('posts.search');

});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
