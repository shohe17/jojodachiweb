<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testExample()
  {
    $this->withoutExceptionHandling();
    // id1のユーザーをログイン状態にさせ、getでposts.indexにリクエストを送る
    $response = $this->actingAs(User::find(1))->get(route('posts.comment'));
    // 引数に入ってるリクエストコードを受け取れてるか確認する
    $response->assertStatus(200);
  }
}
