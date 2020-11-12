<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //php artisan migration 発動時にupメソッドを実行
    public function up()
    {
        //テーブル、カラム、インデックスをdbに追加する、引数1はテーブル名、2は新しいテーブルを定義するために使用するBlueprintオブジェクトを受け取るクロージャ？
        Schema::create('users', function (Blueprint $table) {
            //型がbigintのidを作成
            $table->id();
            //型が文字列のnameを作成
            $table->string('name');
            //uniqueで同じ値を存在させないようにする
            $table->string('email')->unique();
            $table->text('image_at');
            $table->text('biography');
            //nullableでtimestampのnullを許可する（基本強制）
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
