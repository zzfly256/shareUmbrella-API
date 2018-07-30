<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class apiController extends Controller
{
    /* 用户 API
     * Author: Rytia
     * */
    public function getInfo($id){
        $user = User::find($id);
        if(is_null($user)){
            return $this->dataEncode('','404','500404','未找到用户');
        } else{
            return $this->dataEncode($user);
        }
    }

    public function updateInfo(Request $request,$id){
        $user = User::find($id);
        if(is_null($user)){
            return $this->dataEncode('','404','500404','未找到用户');
        } else{
            if($user->update($request->all())){
                return $this->dataEncode($user);
            } else {
                return $this->dataEncode('','200','500501','数据库更新失败');
            }

        }
    }


    public function login(){
        $postInfo = User::decodeInfo($_GET['verify_request']);
        return $this->dataEncode(User::loginByYiban($postInfo));
    }
    public function loginCallback(){
    }
}
