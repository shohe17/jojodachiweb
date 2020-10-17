<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('likes', function(Blueprint $table) {
        //自動増分する値を指定
        $table->id();
        //整数の値を指定
        // $table->unsignedBigInteger('user_id');
        // $table->unsignedBigInteger('post_id');

        // $table->foreign('user_id')->references('id')->on('users');
        // $table->foreign('post_id')->references('id')->on('users');

        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('post_id')->constrained()->onDelete('cascade');

        //外部キー設定（関連付いたテーブルに指定したカラムがなければエラーが出る）
        // $table->foreign('user_id')
        //       ->references('id')
        //       ->on('users')
        //       //親テーブル(users)に対して更新を行うと子テーブル(likes)で同じ値を持つカラムの値も合わせて更新される
        //       ->onDelete('cascade');

        // $table->foreign('post_id')
        //       ->references('id')
        //       ->on('posts')
        //       ->onDelete('cascade');

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
