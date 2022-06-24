<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    if ($this->path() == 'post') {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, mixed>
   */
  public function rules()
  {
    return [
      'name' => 'required|max:64',
      'comment' => 'required',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => '名前は必ず入力してください',
      'name.max' => '名前は64字以内で入力してください',
      'comment.required' => '投稿は必ず入力してください',
    ];
  }
}
