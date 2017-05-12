<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Service\MsgcodeService;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonSuccess($data=[]){
        return [
            'code'=>MsgcodeService::OP_SUCCESS,
            'msg'=>MsgcodeService::getRetMsg(MsgcodeService::OP_SUCCESS),
            'data'=>$data
        ];
    }

    public function jsonFail($code=MsgcodeService::OP_FAILRE){
        return [
            'code'=>$code,
            'msg'=>MsgcodeService::getRetMsg($code)
        ];
    }
}
