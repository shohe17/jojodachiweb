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
      // withcountで引数の値を計算、orderByで表示順指定、getでpostデータを取得
      // , withcount なくてもいいね押せるし変わりないような気がする
      $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->get();
      //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
      return view('posts/index', [
        //posutsテーブルデータをテンプレートに渡す
        'posts' => $posts,        
      ]);
    }

    public function showCreateForm()
    {
      //posts/createファイルに移動
      return view('posts/create');
    }

    //バリデーション、データ受け取り
    public function create(Createpost $request)
    {
      //確認 タイトルだけが投稿された時のバリデーション
      //変数定義
      $user_id = 1;
      //strageのappの引数でもらってるディレクトリにデータを保存
      $path = $request->image->store("public/posts/$user_id");
      //postクラスのインスタンス生成
      $post = new Post();
      //postのtitleはリクエストされたtitleと定義
      $post->title = $request->title;
      // 確認, $pathの文字列にpublic/が合った場合、publc/を空白に変える？
      $post->image_at = str_replace('public/', '', $path);
      //postのuser_idはuser_idと定義
      $post->user_id = $user_id;
      //ログインユーザーのpostデータを保存
      Auth::user()->posts()->save($post);
      //画面遷移
      return redirect()->route('posts.index');
    }

    //id受け取り
    public function showEditForm(int $id)
    {
      //引数で渡されたidをもつpostテーブルのデータを読み込み
      $post = Post::find($id);
      //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
      return view('posts/edit', [
        'post' => $post,
      ]);
    }

    //id受け取り、バリデーション、リクエスト受け取り
    public function edit(int $id, EditPost $request )
    {
      //引数で渡されたidをもつpostテーブルのデータを読み込み
      $post = Post::find($id); 
      $user = Auth::user();
      //postのtitleはリクエストされたtitleと定義
      $post->title = $request->title;
      //dbに保存
      $post->save();
      //mypageに移動
      return redirect()->route('mypage', [
        'user_name' => $user->name,
      ]);
    }

    //id受け取り、リクエスト受け取り
    public function delete(int $id)
    {
      //引数で渡されたidをもつpostテーブルのデータを読み込み
      //インスタンスはクラスを実体化したもの
      $post = Post::find($id);
      //userの名前を取るコード
      $user = Auth::user();
      //削除
      $post->delete();
      //マイページに移動
      return redirect()->route('mypage', [
        'user_name' => $user->name,
      ]);
    }

    //name受け取り
    public function ShowMypageForm(string $name)
    {
      //受け取ったnameレコードをもつuserクラスのデータ一つと、postsデータを読み込み
      $user = User::where('name', $name)->with('posts')->first();
      // dd($name);
      //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
      //
      return view('posts/mypage', [
      //postsテーブルデータをテンプレートに渡す
      'posts' => $user->posts,
      'user' => $user,
      ]);
    }

    //引数のIDに紐づくpostにlikeする
    public function like($id)
    {
      //ボタンを押した時にいいね数が追加
      Like::create([
        //postidは押されたpostがもつid
        'post_id' => $id,
        //ログインユーザーのid
        'user_id' => Auth::id(),
      ]);
      return redirect()->back();
    }

    public function unlike($id)
    {
      //likeクラスのpostidをもつレコードを一つ、ログインしているuseridを読み込み
      $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
      //削除
      $like->delete();
      //画面遷移
      return redirect()->back();
    }

    //リクエストされたデータ受け取り
    public function search(Request $request)
    {
      //TODOバリデーション
      //データ受け取り
      $request->search;
      //あいまい検索
      $posts = Post::where('title', 'like', "%$request->search%")->get();
      //リダイレクト
      return view('posts/index', [
        //posutsテーブルデータをテンプレートに渡す
        'posts' => $posts,
      ]);
    }


    public function showCommentForm(Post $posts, int $id) 
    {
      //引数で渡されたidをもつpostsテーブルのデータを読み込み
      $posts = Post::find($id);
      //withと同じ役割で、リレーション下にあるcommentsテーブルデーターをとってくる？
      $posts->load('comments');
      //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
      return view('posts/comment', [
        'posts' => $posts,
      ]);
    }

    //バリデーション、リクエストデータ受け取り
    public function createComment(CreateComment $request)
    {
      //空のインスタンス作成
      $comment = new Comment();
      //リクエストデータに、fillableで指定した内入ってるデータを受け取る
      $savedata = $request->only($comment->getFillable());
      //コメント作成
      $comment = $comment->create($savedata);
      //前の画面にリダイレクト
      return redirect()->back();
    }

     public function follow(int $id)
     {
      // ログインしてるユーザーのI’dをもつデータ取得する
      $follower = Auth::user(); 
      // フォローした人のuser_idを保存
      $follower->follow($id);     
      // 画面遷移
      return back();
     }

     public function unfollow(int $id)
     {
      //ログインしてるユーザーのidをもつデータ取得する
      $following = Auth::user();
      // フォロー解除した人のuser_idを削除
      $following->unfollow($id);
      //画面遷移
      return back();
     }

     //nameデータ受け取り
     public function ShowUsereditForm(string $name)
     {
       //受け取ったnameレコードをもつuserクラスのデータ一つと、posts,followsデータを読み込み
      $user = User::where('name', $name)->with(['posts', 'follows'])->first(); 
      $user->load('follows');
      //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
      return view('mypages/useredit', [
        'user' => $user,
        ]);
     }

     // nameデータ、リクエストデータ受け取り
     public function editMypage(string $name, Request $request)
     {
      //TODOバリデーション
      //strageのappの引数でもらってるディレクトリにデータを保存
      //保存するときはpublic/user
      //呼び出すときにpublicがあると困る
      $path = $request->image->store("public/user");
      //userクラスのインスタンスの、nameレコードをもつデータの一つ目を読み込み
      $user = User::where('name', $name)->first();
      //$pathの時は、public/を空に変える
      $user->image_at = str_replace('public/', '', $path);
      //リクエストされたbiorographyと定義
      $user->biography = $request->biography;
      //保存
      $user->save();
      //画面遷移
      return redirect()->route('mypage', [
        'user_name' => $name
      ]);
     }
}