<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //usersテーブルにデータ挿入
      DB::table('users')->insert([
        //左がキー（カラム）で右は値
        'name' => 'test',
        'email' => 'test@gmail.com',
        'image_at' => '1',
        'biography' => 'aaa',
        //bcrypt関数は()内を暗号化
        'password' => bcrypt('test1234'),
        //挿入時の時間を入れる
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
