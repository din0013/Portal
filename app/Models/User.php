<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/03/30
 * Time: 21:59
 */
namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use FormAccessible;

    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'username',
        'password',
    ];
}