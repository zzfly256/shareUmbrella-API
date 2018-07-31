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
        if (!isset($_GET['verify_request']) && !isset($_COOKIE['user'])) {
            return redirect("https://openapi.yiban.cn/oauth/authorize?client_id=ca605d44857848cd&redirect_uri=http://f.yiban.cn/iapp257907");
        } else {
            $postInfo = User::decodeInfo($_GET['verify_request']);
            $user = User::loginByYiban($postInfo);
            setcookie('user',json_encode($user),time()+3600,"/front_end");
            return redirect('/front_end');
        }
    }
}
