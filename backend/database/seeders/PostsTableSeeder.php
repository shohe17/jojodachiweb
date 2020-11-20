<?php
//テストデータを入れるためだけのファイル
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usersテーブルに1つだけレコードを挿入する
        $user = DB::table('users')->first();
        // $titleに3つの値をもつ配列をいれる
        $titles = ['仗助', 'ハイウェイスター', 'アブドゥル'];

        //配列か連想配列に対する繰り返し分
        foreach ($titles as $title) {
          //postsテーブルに[]内のデータを挿入
          DB::table('posts')->insert([
            'user_id' => $user->id,
            'title' => $title,
            'image_at' => 1,
            //挿入時の時間を入れる
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
        }
    }
}
