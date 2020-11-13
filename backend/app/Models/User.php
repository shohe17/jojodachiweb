<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{ 
    use HasFactory, Notifiable;

    public function posts()
    {
      //Userクラスはpostを複数持っている、一対多の関係
      return $this->hasMany('App\Models\Post');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // 複数の値（カラム）を入力するために必要？
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // 確認 引数の中身を隠す？
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   //多対多のリレーション
   public function follows()
   {
      //確認, 引数の意味
     return $this->belongsToMany(self::class, 'follows', 'user_id', 'followed_id');
   }
 
   //多対多のリレーション
   public function followers()
   {
     return $this->belongsToMany(self::class, 'follows', 'followed_id', 'user_id');
   }
 
   //フォロー
   public function follow(int $user_id) 
   {
     //多対多のリレーション追加
     return $this->follows()->attach($user_id);
   }
 
   //フォローやめる
   public function unfollow(Int $user_id)
   {
     //多対多のリレーション削除
     return $this->follows()->detach($user_id);
   }
 
   // フォローしているか
   public function isFollowing(Int $user_id) 
   {
     return (boolean) $this->follows()->where('followed_id', $user_id)->first(['followed_id']);
   }
}