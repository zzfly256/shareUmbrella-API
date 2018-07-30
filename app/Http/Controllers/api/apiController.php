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
    public function login(){
        $postInfo = User::decodeInfo($_GET['verify_request']);
        return $this->dataEncode(User::loginByYiban($postInfo));
    }
    public function loginCallback(){
    }
}
