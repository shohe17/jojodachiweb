<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // テーブル作成。テーブルを作成する順番によっては外部キーエラーがでる可能性がある
        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            LikesTableSeeder::class,
        ]);
    }
}
