<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Createpost extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    //リクエスト内容に基づいた権限の確認
    //今回は使わないので、faultからtrueに
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      //required（必須入力）を指定することにより、titleを入力しないとエラーが出る
      'title' => 'required|max:150',
      'image' => 'mimes:jpeg,png,jpg,gif|max:1024',
    ];
  }

  public function attributes()
  {
    return[
      'title' => '説明文',
      'image' => '1ギガバイト未満の画像を選択してください',
      'mimes' => '指定された拡張子（PNG/JPG/GIF）ではありません。',
    ];
  }
}
