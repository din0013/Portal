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

class UserService extends BaseService
{
    public function FindUserById(int $id)
    {
        try{
            $results = User::find($id);

            if (empty($results)) {
                return false;
            } else {
                return $results;
            }
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    public function FindAllUser()
    {
        $results = User::all();

        return $results;
    }

    public function UserRegister(UserRegisterRequest $request)
    {
        $user =new User;

        try{
            $user -> name = $request -> UserName;
            $user -> mailaddress = $request -> MailAddress;
            $user -> password = Hash::make($request -> Password);

            $user -> save();
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    public function UserDelete(int $id)
    {
        try{
            $user = User::find($id);

            if (empty($user)) {
                return false;
            } else {
                $user->delete();

                return true;
            }
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }
}