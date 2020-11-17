<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMypage;
use App\Models\User;


class UserController extends Controller
{
  //name受け取り
  public function ShowMypageForm(string $name)
  {
    //受け取ったnameレコードをもつuserクラスのデータ一つと、postsデータを読み込み
    $user = User::where('name', $name)->with('posts')->first();
    //第一引数でviewsの中の指定したファイルを表示させ、第二引数でデータを渡す
    return view('posts/mypage', [
    //postsテーブルデータをテンプレートに渡す
    'posts' => $user->posts,
    'user' => $user,
    ]);
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
  public function editMypage(string $name,CreateMypage $request )
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
