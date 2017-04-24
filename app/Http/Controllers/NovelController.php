<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Redirect;

use App\Http\Requests\NovelMstRegisterRequest;
use App\Http\Service\NovelService;

class NovelController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this -> service = new NovelService();
    }

    public function index()
    {
        $result = $this -> service -> FindAllNovel();

        return view('novel.index', [
            "results" => $result
        ]);
    }

    public function edit(int $id = 0)
    {
        //編集の場合、利用者を検索
        $result = $this -> service -> FindNovelById($id);

        if ($result) {
            return view('novel.edit', [
                "results" => $result
            ]);
        } else {
            return redirect('novel/index')
                -> with('message', '利用者が存在しません');
        }
    }

    public function create()
    {
        return view('novel.edit');
    }


    public function register(NovelMstRegisterRequest $request)
    {
        $this -> service -> NovelRegister($request);

        return redirect('novel/index')
            -> with('message', '利用者の登録が完了しました!');
    }

    public function delete(int $id = 0)
    {
        $result = $this -> service -> NovelDelete($id);

        if ($result) {
            return redirect('novel/index')
                ->with('message', '利用者の削除が完了しました!');
        } else {
            return redirect('novel/index')
                ->with('message', '利用者が存在しません');
        }
    }
}
