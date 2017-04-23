<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/02
 * Time: 0:48
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    //protected $redirectRoute = 'get.register';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'MailAddress' => 'required|email|max:50',
            'Password'=>'required|min:8|max:20',
        ];
    }

    public function messages()
    {
        return [
            'MailAddress.required' => 'メールアドレスは必須です',
            'MailAddress.email' => 'メールアドレスの形式で入力してください',
            'MailAddress.max' => 'メールアドレスは50文字以内で入力してください',
            'MailAddress.unique' => 'すでに使用されているメールアドレスです',
            'Password.required' => 'パスワードは必須です',
            'Password.min' => 'パスワードは8文字以上入力してください',
            'Password.max' => 'パスワードは20文字以内で入力してください',
        ];
    }
}