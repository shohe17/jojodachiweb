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
      //確認dbに20-24行目のデータをテストデータとして挿入する
      DB::table('users')->insert([
        'name' => 'test',
        'email' => 'test@gmail.com',
        //bcrypt関数は()内の暗号化
        'password' => bcrypt('test1234'),
        //Carbon::now();は挿入時の時間
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
}
