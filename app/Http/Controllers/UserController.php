<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Validator;
use Redirect;
use Hash;

use App\Models\User;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $results = User::all();

        return view('user.index', [
            "results" => $results
        ]);
    }

    public function edit(int $id = 0)
    {
        //編集の場合、利用者を検索
        $user = User::find($id);

        if (empty($user)){
            return redirect('user/index')
                -> with('message', '利用者が存在しません');
        }

        return view('user.edit', [
            "results" => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }


    public function register(UserRegisterRequest $request)
    {
        $user =new User;

        $user -> name = $request -> UserName;
        $user -> mailaddress = $request -> MailAddress;
        $user -> password = Hash::make($request -> Password);

        $user -> save();

        return redirect('user/index')
            -> with('message', '利用者の登録が完了しました!');
    }

    public function delete(int $id = 0)
    {
        $user = User::find($id);
        $user -> delete();

        return redirect('user/index')
            -> with('message', '利用者の削除が完了しました!');
    }
}
