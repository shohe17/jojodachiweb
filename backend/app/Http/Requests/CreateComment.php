<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateComment extends FormRequest
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

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'comment' => 'required|max:100',
    ];
  }

  public function messages()
  {
    return [
        'comment.max' => 'コメント本文は100文字以内で入力してください',
        'required' => 'コメントは必須項目です'
    ];
  }
}
