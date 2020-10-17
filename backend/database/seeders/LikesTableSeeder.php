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
      //変数に、DBのusersテーブルの最初の値を入れる
      $user = DB::table('users')->first();
      $post = DB::table('users')->first();
      //DBのlikesテーブルに21,22行目の値を入れる
      DB::table('likes')->insert([
        'user_id' => $user->id,
        'post_id' => $post->id,
      ]);
    }
}
