<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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

      //一覧表示にリダイレクト
      return redirect()->route('posts.index');

    }

    //editbladeルーティング
    public function showEditForm(int $id)
    {
      //編集対象のpostデータを取得
      $post = Post::find($id);
      //editbladeにルーティング
      //第一引数に指定されたファイルを返す
      //第二引数は渡す変数を指定、キー（post）が変数の名前
      return view('posts/edit', [
        'post' => $post,
      ]);

    }
    //編集機能追加
    public function edit(int $id, EditPost $request )
    {
      //TODO バリデーション
      //TODO 編集したいpostのデータを取得
      $post = Post::find($id);      

      //TODO 変更内容をdbに保存
      $post->title = $request->title;
      // $post->image_at = $request->image_at;
      $post->save();
      //TODO マイページにリダイレクト
      return redirect()->route('posts.index');
    }

    public function delete (int $id, Request $request)
    {
      //データ受け取り、削除処理
      $post = Post::find($id); 
      //  Post::find($request->id)
      $post->id = $request->id;
      $post->delete();
       
      //リダイレクト
      return redirect('/');
    }

    // public function ShowMypageForm()
    // {
    //   return view('posts/mypage');
    // }

    // public function indexMypage()
    // {
    //   //$postsに、Postモデルのallメソッドでpostデータを全て取得
    //   // dd(123);  
    //   $posts = Post::all();
    //   //view関数でテンプレート（ブラウザ）に取得したデータを渡した結果を返却
    //   //テンプレートのファイル名
    //   //viesフォルダのなかのファイルを返してくれる役割
    //   return view('posts/mypage', [
    //     //posutsテーブルデータをテンプレートに渡す
    //     'posts' => $posts,
    //   ]);
    // }
}