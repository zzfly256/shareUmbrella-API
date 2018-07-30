<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dataEncode($data = [], $httpStatus = '200', $errcode = '0', $errmsg = ''){
        /*
         *  errcode 错误代码一览
         *  0：      正常
         *  500000：  授权失败
         *  500404：  未找到所请求的资源
         * */

        $result = [
            'errmsg' => $errmsg,
            'errcode' => $errcode,
            'data' => $data
        ];
        return response()->json($result,$httpStatus);
    }
}
