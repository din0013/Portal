<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Redirect;
use Hash;
use Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Service\UserService;

class AuthController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this -> service = new UserService();
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
            ])) {
            return redirect('user/index')
                -> with('message', 'ログインしました');
        } else {
            return Redirect::back()->withInput()
                -> with('message', 'ログインに失敗しました');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('auth.login');
    }
}
