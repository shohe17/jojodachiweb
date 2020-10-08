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
        $user = DB::table('users')->first();
        $titles = ['仗助', 'ハイウェイスター', 'アブドゥル'];
        // $user_id = 1;
        // $image_at = 1;
        
        foreach ($titles as $title) {
          DB::table('posts')->insert([
            'user_id' => $user->id,
            'title' => $title,
            'image_at' => 1,
            // 'image_at' => $image_at,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
        }
    }
}
