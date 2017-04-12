<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/02
 * Time: 0:48
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    //protected $redirectRoute = 'get.register';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'UserName' => 'required|max:20|unique:users,name',
            'MailAddress' => 'required|email|max:50|unique:users,mailaddress',
            'Password'=>'required|min:8|max:20',
            'PasswordConfirm'=>'required|min:8|max:20|same:Password',
        ];
    }

    public function messages()
    {
        return [
            'UserName.required' => 'ユーザ名は必須です',
            'UserName.max' => 'ユーザ名は20文字以内で入力してください',
            'UserName.unique' => 'すでに使用されているユーザ名です',
            'MailAddress.required' => 'メールアドレスは必須です',
            'MailAddress.email' => 'メールアドレスの形式で入力してください',
            'MailAddress.max' => 'メールアドレスは50文字以内で入力してください',
            'MailAddress.unique' => 'すでに使用されているメールアドレスです',
            'Password.required' => 'パスワードは必須です',
            'Password.min' => 'パスワードは8文字以上入力してください',
            'Password.max' => 'パスワードは20文字以内で入力してください',
            'PasswordConfirm.required' => 'パスワード(確認)は必須です',
            'PasswordConfirm.min' => 'パスワード(確認)は8文字以上入力してください',
            'PasswordConfirm.max' => 'パスワード(確認)は20文字以内で入力してください',
            'PasswordConfirm.same' => 'パスワードとパスワード(確認)が一致しません',
        ];
    }
}