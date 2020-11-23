<?php
namespace App\Http\Controllers;

use App\Http\Requests\Createpost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditPost;

class PostController extends Controller
{
  public function index()
  {
    // withcountで引数の値を計算、orderByで表示順指定、getでpostデータを取得
    // 確認withcount なくてもいいね押せるし変わりないような気がする
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
    $user_id = Auth::id();
    //strageのappの引数でもらってるディレクトリにデータを保存
    $path = $request->image->store("public/posts/$user_id");
    //postクラスのインスタンス生成
    $post = new Post();
    //postのtitleはリクエストされたtitleと定義
    $post->title = $request->title;
    //$pathの文字列にpublic/が合った場合、publc/を空白に変更
    $post->image_at = str_replace('public/', '', $path);
    //postのuser_idはuser_id
    $post->user_id = $user_id;
    //ログインユーザーのpostデータを保存
    $post->save();
    //画面遷移
    return redirect()->route('posts.index');
  }

  //id受け取り
  public function showEditForm(int $id)
  {
    $current_post = Post::find($id);
    if (is_null($current_post)) {
      abort(404);
    }
    $login_id = Auth::id();
    if ($login_id !== $current_post->user_id) {
      abort(404);
    }
    //引数で渡されたidをもつデータを読み込み
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

  //リクエストされたデータ受け取り
  public function search(Request $request)
  {
    //あいまい検索
    $posts = Post::where('title', 'like', "%$request->search%")->get();
    //リダイレクト
    return view('posts/index', [
      //posutsテーブルデータをテンプレートに渡す
      'posts' => $posts,
    ]);
  }
}