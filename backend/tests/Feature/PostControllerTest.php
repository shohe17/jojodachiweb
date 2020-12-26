<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
  // use RefreshDatabase;
  public function testIndex()
  {
      // 準備 userを作る
      // makeはdbにデータをいれない
      // createはdbにデータ
      $user = User::factory()->make();

      // ログイン状態している
      $this->actingAs($user);
      // 実行（画面を開く）
      $response = $this->get(route('posts.index'));
      // 検証
      $response->assertStatus(200);
  }

  // testShowCreateFormを実行した結果を確認
  public function testShowCreateForm()
  {
      // 準備
      $user = User::factory()->make();
      $this->actingAs($user);
      // 実行した結果が成功するかどうか検証
      // getは引数で指定されたurlにgetリクエストを投げる
      $response = $this->get(route('posts.create'));
      // assertは確認や検証みたいな意味
      // assertseeレスポンスの中に文字が入ってることを確認する
      $response->assertStatus(200)->assertSee('画像投稿');
  }

  /** 
   * @test
   */
  public function ログインしていない時にログインしないといけないページをひらいたらログインページにリダイレクトされる()
  {
    $response = $this->get(route('posts.create'));
    // assertは確認や検証みたいな意味
    $response
      ->assertStatus(302)
      ->assertRedirect(route('login'));
  }


}
