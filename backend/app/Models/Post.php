<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
  public function likes()
  {
      //Postクラスはlikesを複数持っている、一対多の関係
      return $this->hasMany(Like::class, 'post_id');
  } 

  public function comments()
  {
      //このクラスは多くのcommentをもっている、一対多の関係
      return $this->hasMany(Comment::class, 'post_id', 'id');
  } 

  public function user()
  {
      return $this->belongsTo(User::class);
  }
  //postにlikeがついてるか判断するメソッド
  //いいねしてたらtrue、してなかったらfalse
  public function is_liked_by_auth_user()
  {
    //ログインしているid
    $id = Auth::id();
    //array()は[]で良い
    $likers = [];

    foreach($this->likes as $like) {
      //配列を押したときにuser_idを
      array_push($likers, $like->user_id);
    }
    // 配列の中にログインしてるidとlikeしてるuser_idがあればtrue、なければfalse
    return in_array($id, $likers); 
    // if (in_array($id, $likers)) {
    //   return true;
    // } else {
    //   return false;
    // }
  }
}

