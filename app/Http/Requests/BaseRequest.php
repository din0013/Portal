<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/02
 * Time: 0:48
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
}