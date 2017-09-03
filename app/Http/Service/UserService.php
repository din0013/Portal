<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/22
 * Time: 9:17
 */
namespace App\Http\Service;

use Hash;
use Mockery\CountValidator\Exception;
use App\Models\User;
use Request;

class UserService extends BaseService
{
    /**
     * IDからユーザを取得する処理
     * @param int $id ユーザID
     * @return bool 取得結果
     */
    public static function FindUserById(int $id)
    {
        try
        {
            $results = User::find($id);

            if (empty($results))
            {
                return false;
            }
            else
            {
                return $results;
            }
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    /**
     * 全ユーザを取得する処理
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function FindAllUser()
    {
        $results = User::all();
        $value = Request::cookie('name');
        echo $value;
        return $results;
    }

    /**
     * ユーザ登録処理
     * @param $request
     */
    public static function UserRegister($request)
    {
        $user =new User;

        try
        {
            $user -> provider_user_id = $request -> token;
            $user -> provider_access_token = $request -> tokenSecret;

            $user -> save();
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    /**
     * IDからユーザを削除する処理
     * @param int $id
     * @return bool
     */
    public static function UserDelete(int $id)
    {
        try
        {
            $user = User::find($id);

            if (empty($user))
            {
                return false;
            }
            else
            {
                $user->delete();

                return true;
            }
        }
        catch(Exception $ex)
        {
            echo $ex;
            return false;
        }
    }
}