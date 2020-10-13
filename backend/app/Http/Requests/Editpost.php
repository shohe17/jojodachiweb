<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\Createpost;

class Editpost extends Createpost
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required|max:150'
        ];
    }

    public function attributes()
    {
      return [
        'title' => '説明文'
      ];
    }
}
