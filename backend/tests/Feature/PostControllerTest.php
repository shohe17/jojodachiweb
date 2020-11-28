<?php
namespace Tests\Feature;

use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        // 準備 userを作る
        $user = User::factory()->make();
        // ログイン状態している
        $this->actingAs($user);
        // 実行
        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
    }
}
