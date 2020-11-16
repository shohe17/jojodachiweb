<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
  //引数のIDに紐づくpostにlikeする
  public function like($id)
  {
    //ボタンを押した時にいいね数が追加
    Like::create([
      //postidは押されたpostがもつid
      'post_id' => $id,
      //ログインユーザーのid
      'user_id' => Auth::id(),
    ]);
    return redirect()->back();
  }

  public function unlike($id)
  {
    //likeクラスのpostidをもつレコードを一つ、ログインしているuseridを読み込み
    $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
    //削除
    $like->delete();
    //画面遷移
    return redirect()->back();
  }
}
