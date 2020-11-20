<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CreateComment;


class CommentController extends Controller
{
  public function showCommentForm(Post $posts, int $id) 
  {
    //引数で渡されたidをもつpostsテーブルのデータを読み込み
    $posts = Post::find($id);
    //withと同じ役割で、リレーション下にあるcommentsテーブルデーターをとってくる？
    $posts->load(['comments' => function($query){
      $query->orderBy('created_at', 'desc');
    }]);
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
}
