<?php

namespace App\Http\Controllers\Api;

use App\Area;
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

    public function getUserItems($id){
        $user = User::find($id);
        if(is_null($user)){
            return $this->dataEncode('','404','500404','未找到用户');
        } else{
          return $this->dataEncode($user->items());
        }
    }

    /* 共享雨伞条目  API*/
    public function listItem(){
        return $this->dataEncode(Item::getAllItem());
    }

    public function createItem(Request $request){
        $input = $request->all();
        if(isset($input['content'])){
            $input['content'] = Item::blockWords($input['content']);
        }
        if(isset($input['title'])){
            $input['title'] = Item::blockWords($input['title']);
        }
        if(Item::create($input)){
            return $this->dataEncode('','201','0','创建成功');
        } else{
            return $this->dataEncode('','200','500502','数据创建失败');
        }
    }

    public function getItem($id){
        $item = Item::getItem($id);
        // 数据库查询返回的时 Collection
        if($item->isEmpty()){
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
            $input = $request->all();
            if(isset($input['content'])){
                $input['content'] = Item::blockWords($input['content']);
            }
            if(isset($input['title'])){
                $input['title'] = Item::blockWords($input['title']);
            }
            if($item->update($input)){
                return $this->dataEncode(Item::getItem($id));
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
                return $this->dataEncode('','201','0','删除成功');
            } else {
                return $this->dataEncode('','200','500503','数据删除失败');
            }
        }
    }

    public function searchItem($target){
        if(isset($_GET['content'])){
            switch($target) {
                case 'title':
                    return $this->dataEncode(Item::searchItem('items','title',htmlentities($_GET['content'])));
                    break;
                case 'tag':
                    return $this->dataEncode(Item::searchItem('items','tags',htmlentities($_GET['content'])));
                    break;
                case 'usernick':
                    return $this->dataEncode(Item::searchItem('users','usernick',htmlentities($_GET['content'])));
                case 'coordinate':
                    $coordinate = explode(',',$_GET['content']);
                    if(count($coordinate)==2){
                        return $this->dataEncode(Item::getNearbyItem($coordinate[0],$coordinate[1]));
                    }
                default:
                    return $this->dataEncode('','400','500400','搜索类型错误');
            }
        } else {
            return $this->dataEncode('','400','500400','搜索参数 content 不存在');
        }
    }

    /* 区域  API*/
    public function listArea(){
        return $this->dataEncode(Area::all());
    }

    public function getArea($id){
        $area = Area::find($id);
        if(is_null($area)){
            return $this->dataEncode('','404','500404','未找到指定区域');
        } else{
            return $this->dataEncode($area);
        }
    }

    public function getAreaItems($id){
        $area = Area::find($id);
        if(is_null($area)){
            return $this->dataEncode('','404','500404','未找到指定区域');
        } else {
            return $this->dataEncode(Area::find($id)->items());
        }
    }

}
