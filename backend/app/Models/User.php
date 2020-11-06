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
      // 確認userとpostsの関係性（一対多）を表していて、テーブル同士のリレーションを定義する度に必要
      return $this->hasMany('App\Models\Post');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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
    //確認 多対多のリレーション
    public function follows()
    {
        return $this->belongsToMany(self::class, 'follows', 'user_id', 'followed_id');
    }
    //フォロー
    public function follow(int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }
    //フォローやめる
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }
    // フォローしているか
    public function isFollowing(Int $user_id) 
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['followed_id']);
    }
}
