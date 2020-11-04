<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComment;
use App\Http\Requests\Createpost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Requests\EditPost;
use App\Models\Comment;
use App\Models\follow;
use App\Models\Like;

class PostController extends Controller
{
    public function index()
    {
      // withcountで引数の値を数え、getで表示させる
      $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->get();
      //view関数でテンプレートに取得したデータを渡した結果を返却
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

    public function create(Createpost $request)
    {
      // TODO バリデーション後で書く
      //確認 タイトルだけが投稿された時のバリデーション
      //画像をフォルダに保存
      $user_id = 1;
      //strageのappの引数にもらってるデータを保存
      
      $path = $request->image->store("public/posts/$user_id");
      //dbにユーザーが投稿した内容を保存
      $post = new Post();
      $post->title = $request->title;
      //第一引数を第二引数に置き換える
      $post->image_at = str_replace('public/', '', $path);
      $post->user_id = $user_id;
      //確認、青文字はクラスを呼び出している？
      Auth::user()->posts()->save($post);
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
      //第二引数はs渡す変数を指定、キー（post）が変数の名前
      return view('posts/edit', [
        'post' => $post,
      ]);

    }
    //編集機能追加
    public function edit(int $id, EditPost $request )
    {
      //TODO バリデーション
      //引数で渡されたidをもってるポストテーブルのデータを読み込み
      $post = Post::find($id); 
      
      $post->title = $request->title;
      //変更内容をdbに保存
      $post->save();
      //マイページに移動
      return redirect()->route('posts.mypage');
    }

    public function delete (int $id, Request $request)
    {
      //postクラスのインスタンスの中の選択されたidをもつデータ受け取る
      $post = Post::find($id);
      //$postのidはリクエストされたidになる
      $post->id = $request->id;
      //削除処理
      $post->delete();
      //マイページに移動
      return redirect()->route('posts.mypage');
    }

    public function ShowMypageForm(string $name)
    {
      //withでリレーション関係にあるデータをとってくる
      $user = User::where('name', $name)->with('posts')->first();
      //ユーザー名からユーザーデータを引っ張る
      //view関数の第一引数でファイル名を指定
      //viewsフォルダのなかのファイルを返してくれる役割
      return view('posts/mypage', [
      //postsテーブルデータをテンプレートに渡す
      'posts' => $user->posts,
      'user' => $user,
      ]);
    }

    //引数のIDに紐づくlikrにする
    public function like($id)
    {
      //ボタンを押した時にいいね数が追加
      Like::create([
        'post_id' => $id,
        'user_id' => Auth::id(),

      ]);
      return redirect()->back();
    }

    public function unlike($id)
    {
      //ボタンを押した時にいいね数が減少
      $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
      $like->delete();
      return redirect()->back();
    }

    public function search(Request $request)
    {
      //TODOバリデーション
      //データ受け取り
      $request->search;
      //データ検索
      $posts = Post::where('title', 'like', "%$request->search%")->get();
      //データ表示
      //リダイレクト
      return view('posts/index', [
        //posutsテーブルデータをテンプレートに渡す
        'posts' => $posts,
      ]);
    }

    public function showCommentForm(Post $posts, int $id) 
    {
      //Postクラスのインスタンス
      $posts = Post::find($id);
      $posts->load('comments');
      return view('posts/comment', [
        'posts' => $posts,
      ]);
    }

    public function createComment(CreateComment $request)
    {
      //インスタンス作成
      $comment = new Comment();
      $savedata = $request->only($comment->getFillable());
      //リクエストデータを受け取り
      // $comment->comment = $request->comment;
      //データ保存 fill関数は引数でcommentmodelの$fiallableデータを保存？
      // $comment->fill($savedata)->save();
      $comment = $comment->create($savedata);
      
      //データ送信元のページへ移動
      return redirect()->back();
    }

     public function follow(int $id)
     {
      // ログインしてるユーザーのI’dを取得する
      $follower = Auth::user();      
      // followerテーブルに保存
      $follower->follow($id);     
      // 画面遷移
      return back();
     }

     public function unfollow(int $id)
     {
      //ログインしてるユーザーのidを取得する
      $following = Auth::user();
      //追加されているデータを削除する
      $following->unfollow($id);
      //画面遷移
      return back();
     }
     
}