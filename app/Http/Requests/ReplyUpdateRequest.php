<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if ($this->path() == 'replyupdate') {
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
        'reply' => 'required',
      ];
    }
  
    public function messages()
    {
      return [
        'reply.required' => '返信は必ず入力してください',
      ];
    }
}
