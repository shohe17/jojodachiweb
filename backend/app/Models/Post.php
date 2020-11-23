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
    //このクラスはuserクラスに紐づいてますよを表す、hasoneのリレーション
    return $this->belongsTo(User::class);
  }

  //postにlikeがついてるか判断するメソッド、いいねしてたらtrue、してなかったらfalse
  public function is_liked_by_auth_user()
  {
    //ログインしているユーザーのid
    $id = Auth::id();
    //array()は[]で
    $likers = [];

    foreach($this->likes as $like) {
      //配列を押したときにuser_idを
      array_push($likers, $like->user_id);
    }
    // 配列の中にログインしてるidとlikeしてるuser_idがあればtrue、なければfalse
    return in_array($id, $likers); 
  }
}

