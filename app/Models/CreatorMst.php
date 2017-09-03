<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/03/30
 * Time: 21:59
 */
namespace App\Models;

class CreatorMst extends BaseModel
{
    protected $table = 'creators_mst';

    protected $fillable = [
        'name',
        'phonetic',
        'property',
    ];

    public function novels()
    {
//        return $this->belongsToMany('App\Models\NovelMst') -> withTimestamps();
        return $this->morphedByMany('App\Models\NovelMst', 'creatorable') -> withTimestamps();
    }
}