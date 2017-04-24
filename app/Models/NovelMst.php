<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/03/30
 * Time: 21:59
 */
namespace App\Models;

class NovelMst extends BaseModel
{
    protected $table = 'novel_mst';

    protected $fillable = [
        'series',
        'no',
        'title',
        'release_date',
        'asin',
        'story',
    ];
}