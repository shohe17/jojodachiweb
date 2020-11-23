<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    //テーブル、カラム、index作成
    Schema::create('posts', function (Blueprint $table) {
      //型がbigintのidカラムを作成
      $table->id();
      //外部キー制約
      $table->foreignId('user_id');
      //型が文字列
      $table->string('title', 150);
      $table->text('image_at');
      //post作成時の時間を指定
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //テーブル削除
    Schema::dropIfExists('posts');
  }
}
