<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  // created_atとupdated_atの自動更新無効
  public $timestamps = false;
  // 複数の値（カラム）を入力するために必要？
  protected $fillable = ['post_id','user_id'];

  // like複数に対してpostは一つ、一対多のリレーション
  public function post()
  {
    return $this->belongsTo(Post::class);
  }
  
  // like複数に対してuserは一つ、一対多のリレーション
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
