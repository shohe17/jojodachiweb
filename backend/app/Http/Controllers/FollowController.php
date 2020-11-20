<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
  public function follow(int $id)
  {
   // ログインしてるユーザーのI’dをもつデータ取得する
   $follower = Auth::user(); 
   // フォローした人のuser_idを保存
   $follower->follow($id);     
   // 画面遷移
   return back();
  }

  public function unfollow(int $id)
  {
   //ログインしてるユーザーのidをもつデータ取得する
   $following = Auth::user();
   // フォロー解除した人のuser_idを削除
   $following->unfollow($id);
   //画面遷移
   return back();
  }
}
