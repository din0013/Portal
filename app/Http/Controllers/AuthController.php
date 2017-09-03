<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Session;
use Redirect;
use Auth;
use Socialite;
use Cookie;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        if (Auth::attempt(
            ['mailaddress' => $request -> MailAddress,
                'password' => $request -> Password,
                'deleted_at' => null,
            ]))
        {
            return redirect('user/index')
                -> with('message', 'ログインしました');
        }
        else
        {
            return Redirect::back()->withInput()
                -> with('message', 'ログインに失敗しました');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('auth.login');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('twitter') -> redirect();
    }

    /**
     * Twitterからユーザー情報を取得する
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try
        {
            $user = Socialite::driver('twitter') -> user();
        }
        catch (Exception $ex)
        {
            return redirect('auth/twitter');
        }

        $token = [
            'oauth_token' => $user -> token,
            'oauth_token_secret' => $user -> tokenSecret,
        ];

        $userInfo = [
            'id' => $user->id,
            'name' => $user->nickname,
            'avater' => $user->avatar,
        ];

        Session::put('access_token', $token);
        $minutes = time() + 7 * 24 * 3600;

        Cookie::queue('counter', $userInfo, $minutes);
        return redirect('user.index');
//        $response =
//            "id: ".$user->id
//            ."<br/>Nickname: ".$user->nickname
//            ."<br/>name: ".$user->name
//            ."<br/>Email: ".$user->email
//            ."<br/>Avater: <img src='".$user->avatar."'>"
//            . "<br/><br/>";
//
//        // OAuth Two Providers
//        $response .= print_r($user, true);
//
//        return $response;
    }
}
