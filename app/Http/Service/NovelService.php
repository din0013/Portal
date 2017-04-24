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
use App\Models\NovelMst;

class NovelService extends BaseService
{
    public static function FindNovelById(int $id)
    {
        try
        {
            $results = NovelMst::find($id);

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

    public static function FindAllNovel()
    {
        $results = NovelMst::all();

        return $results;
    }

    public static function NovelRegister($request)
    {
        $model =new NovelMst;

        try
        {
            $model -> no = $request -> No;
            $model -> series = $request -> Series;
            $model -> title = $request -> Title;
            $model -> release_date = $request -> ReleaseDate;
            $model -> asin = $request -> Picture;
            $model -> story = $request -> Story;

            $model -> save();
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