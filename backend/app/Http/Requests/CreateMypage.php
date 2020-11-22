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
          'biography' => 'required|max:200',
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }

    public function messages()
    {
        return [
            'biography.max' => 'コメント本文は200文字以内で入力してください',
            'image.max' => '1ギガバイト未満の画像を選択してください',
            // 'required' => '画像は必須項目です',
            'image' => '指定されたファイルが画像ではありません。',
            'mimes' => '指定された拡張子（PNG/JPG/GIF）ではありません。',
        ];
    }
}
