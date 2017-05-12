<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/12
 * Time: 12:03
 */

namespace Service;

use App\Article;
use App\ArticleComments;
use App\Jobs\TopicJob;
use App\Topic;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;

class TopicService{

    use DispatchesJobs;

    public static function postTopic(Topic $topic, User $user){
        try {
            $succ = $topic->save();
            if ($succ) {
                self::dispatch(new TopicJob($topic));
            }
            return $succ;
        }catch(\Exception $e){
            throw $e;
        }
    }

    public static function isHisTopic(Topic $topic, User $user){
        return $user->id == $topic->user_id;
    }
}
