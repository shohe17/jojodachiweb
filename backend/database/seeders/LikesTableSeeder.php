<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //usersテーブルのレコードを一つ追加する
      $user = DB::table('users')->first();
      $post = DB::table('users')->first();
      //likesテーブルに21,22行目にデータを挿入
      DB::table('likes')->insert([
        //user_id（キー）にidのみ挿入
        'user_id' => $user->id,
        //post_id（キー）にidのみ挿入
        'post_id' => $post->id,
      ]);
    }
}
