<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/12
 * Time: 11:59
 */
namespace App\Http\Controllers\NewApi;

use App\Jobs\TopicJob;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Topic;
use App\TopicNode;
use App\TopicThumb;
use App\TopicStar;
use App\TopicComment;
use App\Events\TriggerNoticeEvent;
use Service\TopicService;

class TopicController extends Controller
{
    /**
     * The construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getNodes', 'getIndex', 'getShow']]);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postTopic(Request $request)
    {
        $this->validate($request, [
            'title'         =>      'required|string',
            'content'       =>      'required|string',
            'topic_node_id' =>      'required|integer',
        ]);

        //虽然有批量赋值，可那样将影响代码的可阅读性
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->topic_node_id = $request->topic_node_id;
        $topic->user_id = Auth::user()->user()->id;

        $succ = TopicService::postTopic($topic);
        return $succ?$this->jsonSuccess($topic):$this->jsonFail();
    }
}
