<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  
  use HasFactory;
  //確認 値（カラム？）を複数入力するために必要
  protected $fillable = ['post_id', 'user_id', 'comment'];

  // ポストクラスに対して一対多のリレーション
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
  //確認 ユーザークラスに対して一対多のリレーション, 第二引数はuser_idに外部キー指定してるが親にカラムがないから？
  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
