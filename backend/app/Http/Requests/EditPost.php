<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class EditPost extends FormRequest
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
        //required（必須入力）を指定することにより、titleを入力しないとエラーが出る
        'title' => 'required|max:150',
      ];
    }

    public function attributes()
    {
      return [
        'title' => '説明文',
      ];
    }
}
