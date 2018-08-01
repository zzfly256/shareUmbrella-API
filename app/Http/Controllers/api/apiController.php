<?php

namespace App\Http\Controllers\Api;

use App\Item;
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
    public function getUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return $this->dataEncode('','404','500404','未找到用户');
        } else{
            return $this->dataEncode($user);
        }
    }

    public function updateUser(Request $request,$id){
        $user = User::find($id);
        if(is_null($user)){
            return $this->dataEncode('','404','500404','未找到用户');
        } else{
            if($user->update($request->all())){
                return $this->dataEncode($user);
            } else {
                return $this->dataEncode('','200','500501','数据更新失败');
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

    /* 共享雨伞条目  API
     * Author: Rytia
     * */
    public function listItem(){
        return $this->dataEncode(Item::all());
    }

    public function createItem(Request $request){
        if(Item::create($request->all())){
            return $this->dataEncode('','201','0','创建成功');
        } else{
            return $this->dataEncode('','200','500502','数据创建失败');
        }
    }

    public function getItem($id){
        $item = Item::find($id);
        if(is_null($item)){
            return $this->dataEncode('','404','500404','未找到条目');
        } else{
                return $this->dataEncode($item);
        }
    }

    public function updateItem(Request $request,$id){
        $item = Item::find($id);
        if(is_null($item)){
            return $this->dataEncode('','404','500404','未找到条目');
        } else{
            if($item->update($request->all())){
                return $this->dataEncode($item);
            } else {
                return $this->dataEncode('','200','500501','数据更新失败');
            }
        }
    }

    public function destroyItem($id){
        $item = Item::find($id);
        if(is_null($item)){
            return $this->dataEncode('','404','500404','未找到条目');
        } else{
            if($item->delete()){
                return $this->dataEncode($item);
            } else {
                return $this->dataEncode('','200','500503','数据删除失败');
            }
        }
    }

}
