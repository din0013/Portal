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

            if ($creators != null)
            {
                $tmpArray = array();

                foreach ($creators as $creator)
                {
                    $tmpArray[] = $creator -> id;
                }
                $result -> Writer = $tmpArray;
                $result -> Painter = $tmpArray;
            }

            $result -> Id = $novel -> id;
            $result -> No = $novel -> no;
            $result -> Series = $novel -> series;
            $result -> Title = $novel -> title;
            $result -> ReleaseDate = $novel -> release_date;
            $result -> Picture = $novel -> asin;
            $result -> Story = $novel -> story;


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
            $writers = $pRequest -> Writer;
            $painters = $pRequest -> Painter;
            $creators = array_merge($writers, $painters);

            $novel -> creators() -> sync($creators);
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