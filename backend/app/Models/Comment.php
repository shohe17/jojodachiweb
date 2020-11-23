<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  //値を複数入力するために必要
  protected $fillable = ['post_id', 'user_id', 'comment'];

  //ポストクラスに対して一対多のリレーション
  public function post()
  {
    return $this->belongsTo(Post::class);
  }

  //ユーザークラスに対して一対多のリレーション
  //commentはuserに属している
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
