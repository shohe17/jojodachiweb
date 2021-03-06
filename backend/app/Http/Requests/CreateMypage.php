<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMypage extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'biography' => 'max:200',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
    ];
  }

  public function messages()
  {
    return [
      'biography.max' => 'コメント本文は200文字以内で入力してください',
      'image.max' => '1メガバイト未満の画像を選択してください',
      'mimes' => '指定された拡張子（PNG/JPG/GIF）ではありません。',
    ];
  }
}
