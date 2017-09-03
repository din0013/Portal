<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/03/30
 * Time: 21:59
 */
namespace App\Models;

class NovelCreator extends BaseModel
{
    protected $table = 'creators_mst';

    protected $fillable = [
        'novel_id',
        'creator_id',
    ];

    public function novels()
    {
        return $this->belongsTo('App\Models\NovelMst');
    }

    public function creators()
    {
        return $this->hasMany('App\Models\CreatorMst');
    }
}