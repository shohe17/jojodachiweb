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
      //変数にusersテーブルの最初の値を入れる
      $user = DB::table('users')->first();
      //DBのcommentsテーブルに19-21行目を入れる
      DB::table('comments')->insert([
        'user_id' => $user->id,
        'post_id' => 1,
        'commnet' => 'tako',
      ]);
    }
}
