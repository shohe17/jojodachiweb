<?php
namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
  use RefreshDatabase;
  public function testIndex()
  {
      // 準備 userを作る
      $user = User::factory()->make();
      // ログイン状態している
      $this->actingAs($user);
      // 実行
      $response = $this->get(route('posts.index'));

      $response->assertStatus(200);
  }

}
