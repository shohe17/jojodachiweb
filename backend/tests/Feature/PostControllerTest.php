<?php
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   * 
   * @return void
   */
  public function testIndex()
  {
    $this->withoutExceptionHandling();
    // id1のユーザーをログイン状態にさせ、getでposts.indexにリクエストを送る
    $response = $this->actingAs(User::find(1))->get(route('posts.index'));    
    dd($response);
    // 引数に入ってるリクエストコードを受け取れてるか確認する
    $response->assertStatus(200);
    // 引数に入ってるリクエストコードを受け取れてるか確認する
    $response->assertStatus(200);
  }
}
