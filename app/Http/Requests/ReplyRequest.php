<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{
    public function rules()
    {
        return [
            'content' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'content.*' => '内容不能为空且不能少于2字符'
        ];
    }
}
