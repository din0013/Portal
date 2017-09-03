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
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
    //use FormAccessible;
    //use SoftDeletes;

    protected $table = 'users';
    protected $dates = ['deleted_at'];

    //public $timestamps = true;

    public function set_password($password)
    {
        $this->set_attribute('password', Hash::make($password));
    }

    protected $fillable = [
        //'id',
        'name',
        'mailaddress',
        'password',
    ];
}