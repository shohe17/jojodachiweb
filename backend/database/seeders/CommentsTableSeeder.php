<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //usersテーブルに一つのレコードだけ入れる
      $user = DB::table('users')->first();
      //commentsテーブルにデータを挿入
      DB::table('comments')->insert([
        'user_id' => $user->id,
        'post_id' => 1,
        'commnet' => 'tako',
      ]);
    }
}
