<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
      //$postsに、Postモデルのallメソッドでpostデータを全て取得
      $posts = Post::all();
      //view関数でテンプレート（ブラウザ）に取得したデータを渡した結果を返却
      //テンプレートのファイル名
      //viesフォルダのなかのファイルを返してくれる役割
      return view('posts/index', [
        //テンプレートに渡すデータ
        'posts' => $posts,
      ]);
    }
}