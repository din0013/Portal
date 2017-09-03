<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/22
 * Time: 9:17
 */
namespace App\Http\Service;

use Mockery\CountValidator\Exception;
use Twitter;
use Session;

class TwitterService
{
    public static function tweet(string $contents)
    {
        try
        {
            if(Session::has('auth'))
            {
                throw Exception;
            }
            Twitter::postTweet(['status' => $contents, 'format' => 'json']);
        }
        catch(Exception $e)
        {
            throw $e;
        }
    }
}