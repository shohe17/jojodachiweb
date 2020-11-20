<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Models\Post;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\UserController;

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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
//確認 {}内はログインしているユーザーでないと見れなくなる
Route::group(['middleware' => 'auth'], function(){
  // getで/に接続されたときPostControllerクラスのindexメソッドを呼び出す。routeの名前をposts.indexに指定
  Route::get('/', [PostController::class, 'index'])->name('posts.index');

  Route::get('posts/create', [PostController::class, 'showCreateForm'])->name('posts.create');
  Route::post('posts/create', [PostController::class, 'create']);

  Route::get('posts/{id}/edit', [PostController::class, 'showEditForm'])->name('posts.edit');
  Route::post('posts/{id}/edit', [PostController::class, 'edit']);

  Route::post('mypage/delete/{id}', [PostController::class, 'delete']);

  Route::get('posts/like/{id}', [LikeController::class, 'like'])->name('posts.like');
  Route::get('posts/unlike/{id}', [LikeController::class, 'unlike'])->name('posts.unlike');

  Route::post('posts/search', [PostController::class, 'search'])->name('posts.search');

  Route::get('posts/{id}/comment', [CommentController::class, 'showCommentForm'])->name('posts.comment');
  Route::post('posts/{id}/comment', [CommentController::class, 'createComment']);
  
  Route::post('posts/follow/{id}', [FollowController::class, 'follow'])->name('posts.follow');
  Route::post('posts/unfollow/{id}', [FollowController::class, 'unfollow'])->name('posts.unfollow');

  Route::get('mypage/{user_name}', [UserController::class, 'ShowMypageForm'])->name('mypage');

  Route::get('user/edit/{user_name}', [UserController::class, 'ShowUsereditForm'])->name('user.edit');
  Route::post('user/edit/{user_name}', [UserController::class, 'editMypage']);
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
