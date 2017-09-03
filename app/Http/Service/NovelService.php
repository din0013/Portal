<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/22
 * Time: 9:17
 */
namespace App\Http\Service;

use Mockery\CountValidator\Exception;
use App\Http\Requests\NovelMstRegisterRequest;
use App\Models\NovelMst;
use App\Models\CreatorMst;

class NovelService extends BaseService
{
    public static function FindNovelById(int $id)
    {
        try
        {
            $result = new NovelMstRegisterRequest;

            $novel = NovelMst::findOrFail($id);
            $creators = $novel -> creators;
//            dd($creators);

            $result -> Id = $novel -> id;
            $result -> No = $novel -> no;
            $result -> Series = $novel -> series;
            $result -> Title = $novel -> title;
            $result -> ReleaseDate = $novel -> release_date;
            $result -> Picture = $novel -> asin;
            $result -> Story = $novel -> story;

            if ($creators != null)
            {
                foreach ($creators as $creator)
                {
                    if ($creator -> property == 1)
                    {
                        $result -> Writer = $creator -> id;
                    }
                    else if ($creator->property == 2)
                    {
                        $result -> Painter = $creator -> id;
                    }
                    $result -> property = $creator -> property;
                }
            }

            return $result;
        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    public static function GetCreatorsList()
    {
        $collection = CreatorMst::all();

        $creators = array();

        if($collection == null)
        {
            return null;
        }

        foreach ($collection as $item)
        {
            $creators[$item -> id] = $item -> name;
        }

        return $creators;
    }

    public static function FindAllNovel()
    {
        $results = NovelMst::all();

        return $results;
    }

    public static function NovelRegister($pRequest)
    {
        try
        {
            dd($pRequest);

            //IDから小説を更新
            //存在しない場合新規作成
            $novel = NovelMst::updateOrCreate(
                ['id' => $pRequest -> Id],
                [
                    'no' => $pRequest -> No,
                    'series' => $pRequest -> Series,
                    'title' => $pRequest -> Title,
                    'release_date' => $pRequest -> ReleaseDate,
                    'asin' => $pRequest -> Picture,
                    'story' => $pRequest -> Story,
                ]
            );

            //小説に所属するクリエイターを取得
//            $creators = $novel -> creators;
//            $creators = array();
            $writers = $pRequest -> Writer;
            $painters = $pRequest -> Writer;
            $creators = array_merge($writers, $painters);

            $novel -> creators() -> sync($creators);

            //中間テーブルのID用の配列を生成
//            $creatorIds = array();

//            //クリエイターが存在しない場合
//            if ($creators -> count() == 0)
//            {
//                if ($pRequest -> Writer)
//                {
//                    $writer = CreatorMst::firstOrCreate([
//                        'name' => $pRequest -> Writer,
//                        'property' => 1,
//                    ]);
//                    $creatorIds[] = $writer -> id;
//                }
//                if ($pRequest -> Painter)
//                {
//                    $painter = CreatorMst::firstOrCreate([
//                        'name' => $pRequest -> Painter,
//                        'property' => 2,
//                    ]);
//                    $creatorIds[] = $painter -> id;
//                }
//            }
//            //クリエイターが一人存在する場合
//            else if ($creators -> count() == 2
//                && ($pRequest -> Painter == null
//                    || $pRequest -> Writer == null))
//            {
//                if($creators ->contains('property', 1))
//                {
//                    $writer = CreatorMst::firstOrCreate([
//                        'name' => $pRequest -> Writer,
//                        'property' => 1,
//                    ]);
//                    $creatorIds[] = $writer -> id;
//                }
//                else
//                {
//                    $painter = CreatorMst::firstOrCreate([
//                        'name' => $pRequest -> Painter,
//                        'property' => 2,
//                    ]);
//                    $creatorIds[] = $painter -> id;
//                }
//            }
//            //クリエイターが存在する場合
//            else
//            {
//                foreach ($creators as $creator)
//                {
//                    if ($creator -> property == 1)
//                    {
//                        if ($pRequest -> Writer == null)
//                        {
//                            $creator -> delete();
//                        }
//                        else
//                        {
//                            $creator -> name = $pRequest -> Writer;
//                            $creator -> save();
//                            $creatorIds[] = $creator -> id;
//                        }
//                    }
//                    else if ($creator->property == 2)
//                    {
//                        if ($pRequest -> Painter == null)
//                        {
//                            $creator -> delete();
//                        }
//                        else
//                        {
//                            $creator -> name = $pRequest -> Painter;
//                            $creator -> save();
//                            $creatorIds[] = $creator -> id;
//                        }
//                    }
//                }
//            }


        }
        catch(Exception $ex)
        {
            echo $ex;
        }
    }

    public static function NovelDelete(int $id)
    {
        try
        {
            $model = NovelMst::find($id);

            if (empty($model))
            {
                return false;
            }
            else
            {
                $model->delete();

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