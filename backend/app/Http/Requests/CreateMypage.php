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
        ];
    }

    public function messages()
    {
        return [
            'biography.max' => 'コメント本文は200文字以内で入力してください',
        ];
    }
}
