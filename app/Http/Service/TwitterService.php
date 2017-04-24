<?php
/**
 * Created by PhpStorm.
 * User: aki
 * Date: 2017/04/22
 * Time: 9:17
 */
namespace App\Http\Service;

use Twitter;

class TwitterService
{
    public static function tweet(string $contents)
    {
        Twitter::postTweet(['status' => $contents, 'format' => 'json']);
    }
}