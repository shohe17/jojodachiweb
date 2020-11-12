<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('follows', function (Blueprint $table) {
        $table->id();
        //外部キー制約
        //親テーブルにuser_idがない場合エラーを出す
        $table->foreignId('user_id');
        $table->foreignId('followed_id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
