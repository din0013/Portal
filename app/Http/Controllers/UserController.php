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
        $results = User::find($id);

        return view('user.edit', [
            "results" => $results
        ]);
    }

    public function create()
    {
        return view('user.create');
    }


    public function register(UserRegisterRequest $request)
    {
        return redirect('user/index')
            -> with('message', '利用者の登録が完了しました!');
    }

    public function delete()
    {
        $results = User::all();

        return view('user.delete', [
            "results" => $results
        ]);
    }
}
