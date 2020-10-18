<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Post extends Model
{
  public function likes()
  {
      //このクラスは多くのlikesをもっている
      // return $this->hasMany('App\Models\Like');
      return $this->hasMany(Like::class, 'post_id');

  } 

  //postにlikeがついてるか判断するメソッド
  //いいねしてたらtrue、してなかったらfalse
  public function is_liked_by_auth_user()
  {
    //$idはログインしているidと定義？
    $id = Auth::id();
    //arrayは複数の値が入ってる時につかう
    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
}

