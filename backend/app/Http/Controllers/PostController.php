<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
      //$postsに、Postモデルのallメソッドでpostデータを全て取得
      // dd(123);  
      $posts = Post::all();
      //view関数でテンプレート（ブラウザ）に取得したデータを渡した結果を返却
      //テンプレートのファイル名
      //viesフォルダのなかのファイルを返してくれる役割
      return view('posts/index', [
        //posutsテーブルデータをテンプレートに渡す
        'posts' => $posts,
      ]);
    }

    public function showCreateForm()
    {
      //指定したリンクに飛ばす
      return view('posts/create');
    }

    public function create(Request $request)
    {
      // TODO バリデーション後で書く

      // TODO userが入力した内容を受け取る 
      
      //画像をフォルダに保存
      $user_id = 1;
      $path = $request->image->store("public/posts/$user_id");

      //dbにユーザーが投稿した内容を保存
      $post = new Post();
      $post->title = $request->title;
      //第一引数を第二引数に置き換える
      $post->image_at = str_replace('public/', '', $path);
      $post->user_id = $user_id;
      $post->save();

      // //一覧表示にリダイレクト
      return redirect()->route('posts.index');

    }
}