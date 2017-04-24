<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/02
 * Time: 0:48
 */

namespace App\Http\Requests;

class NovelMstRegisterRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'Title' => 'required|max:100',
            'No' => 'required|max:999|integer',
            'Writer' => 'required|max:50',
            'Painter' => 'max:50',
            'Picture' => 'required|max:50',
            'ReleaseDate' => 'required|date_format:"Y-m-d"',
            'Story' => 'max:10000',
        ];
    }

    public function messages()
    {
        return [
            'Title.required' => 'タイトルは必須です',
            'Title.max' => 'タイトルは20文字以内で入力してください',
            'No.required' => '巻数は必須です',
            'No.max' => '巻数は999以内で入力してください',
            'No.integer' => '巻数は数字で入力してください',
            'Writer.required' => 'ユーザ名は必須です',
            'Writer.max' => 'ユーザ名は20文字以内で入力してください',
            'Painter.max' => 'ユーザ名は20文字以内で入力してください',
            'Picture.required' => '画像URL or ASINは必須です',
            'Picture.max' => '画像URL or ASINは100文字以内で入力してください',
            'ReleaseDate.required' => '発売日は必須です',
            'ReleaseDate.date_format' => '発売日は"YYYY-mm-dd"の形式で入力してください',
            'Story.max' => 'あらすじは10000文字以内で入力してください',
        ];
    }
}