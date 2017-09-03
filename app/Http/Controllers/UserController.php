<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Redirect;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Service\UserService;

class UserController extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this -> service = new UserService();
    }

    public function index()
    {
        $result = $this -> service -> FindAllUser();
//        $this -> twitter -> tweet('Hello World!');
        return view('user.index', [
            "results" => $result
        ]);
    }

    public function edit(int $id = 0)
    {
        //編集の場合、利用者を検索
        $result = $this -> service -> FindUserById($id);

        if ($result) {
            return view('user.edit', [
                "results" => $result
            ]);
        } else {
            return redirect('user/index')
                -> with('message', '利用者が存在しません');
        }
    }

    public function create()
    {
        return view('user.create');
    }


    public function register(UserRegisterRequest $request)
    {
        $this -> service -> UserRegister($request);

        return redirect('user/index')
            -> with('message', '利用者の登録が完了しました!');
    }

    public function delete(int $id = 0)
    {
        $result = $this -> service -> UserDelete($id);

        if ($result) {
            return redirect('user/index')
                ->with('message', '利用者の削除が完了しました!');
        } else {
            return redirect('user/index')
                ->with('message', '利用者が存在しません');
        }
    }
}
