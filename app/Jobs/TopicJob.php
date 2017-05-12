<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Topic;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopicJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var Topic
     */
    protected $topic;

    /**
     * TopicJob constructor.
     * @param Topic $topic
     */
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }

    /**
     * 分析该TOPIC
     * 解析出关键字
     * 解析出艾特的人
     *
     * @return void
     */
    public function handle()
    {

    }


    /**
     * 处理失败任务
     *
     * @return void
     */
    public function failed()
    {
        // Called when the job is failing...
        if($this->attempts()>=3){
            $this->delete();
            //remove the job record data to someplace else
            //$job->saveTo(db_or_someplaces);
        }
    }
}
