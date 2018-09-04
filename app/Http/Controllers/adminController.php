<?php

namespace App\Http\Controllers;

use App\Area;
use App\Item;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function user_index(){
        return view('user_index')->with(["user" => User::paginate(20)]);
    }

    public function user_edit($id){
        return view('user_edit')->with(["item" => User::find($id)]);
    }

    public function user_update(Request $request, $id){
        $input = $request->all();
        if(isset($input['password'])){
            if(!empty($input['password'])){
            $input['password'] = md5($input['password']."yiban");
            } else {
                unset($input['password']);
            }
        }
        if(!is_null(User::find($id)) && User::find($id)->update($input)){
            return view('user_edit')->with(["item" => User::find($id), "info"=> "信息更新成功"]);
        }else{
            return view('user_edit')->with(["item" => User::find($id), "info"=> "信息更新失败"]);
        }
    }

    public function user_delete($id){
        if(!is_null(User::find($id)) && User::find($id)->delete()){
            return redirect('/admin/user')->withCookie('info','封禁成功');
        }else{
            return redirect('/admin/user')->withCookie('info','封禁失败');
        }
    }

    public function user_recovery($id){
        if(User::withTrashed()->find($id)->restore()){
            return redirect('/admin/user/block')->withCookie('info','解封成功');
        }else{
            return redirect('/admin/user/block')->withCookie('info','解封失败');
        }
    }

    public function user_block(){
        return view('user_index')->with(["user" => User::onlyTrashed()->paginate(20)]);
    }

    public function user_rank(){
        $result = User::all();
        $temp = [];
        foreach ($result as $value) {
            $temp[$value->id] = $value->items()->count();
        }

        arsort($temp);

        $output = [];
        $count = 0;

        foreach ($temp as $key => $value) {
            $output[] = User::find($key);
            if($count++>20){
                return view('user_index')->with(["user" => $output]);
            }
        }
        return view('user_index')->with(["user" => $output]);
    }

    public function area_index(){
        return view('area_index')->with(["area" => Area::paginate(20)]);
    }

    public function area_edit($id){
        return view('area_edit')->with(["item" => Area::find($id)]);
    }

    public function area_update(Request $request, $id){
        if(!is_null(Area::find($id)) && Area::find($id)->update($request->all())){
            return view('area_edit')->with(["item" => Area::find($id), "info"=> "信息更新成功"]);
        }else{
            return view('area_edit')->with(["item" => Area::find($id), "info"=> "信息更新失败"]);
        }
    }

    public function area_delete($id){
        if(!is_null(Area::find($id)) && Area::find($id)->delete()){
            return redirect('/admin/area')->withCookie('info','删除成功');
        }else{
            return redirect('/admin/area')->withCookie('info','删除失败');
        }
    }

    public function area_add(){
        return view('area_add');
    }

    public function area_create(Request $request){
        if(Area::create($request->all())){
            return redirect('/admin/area')->withCookie('info','创建成功');
        }else{
            return redirect('/admin/area')->withCookie('info','创建失败');
        }
    }

    public function area_rank(){
        $result = Area::all();
        $temp = [];
        foreach ($result as $value) {
            $temp[$value->id] = $value->items()->count();
        }

        arsort($temp);

        $output = [];
        $count = 0;

        foreach ($temp as $key => $value) {
            $output[] = Area::find($key);
            if($count++>20){
                return view('area_index')->with(["area" => $output]);
            }
        }
        return view('area_index')->with(["area" => $output]);
    }

    public function item_index(){
        return view('item_index')->with(["items" => Item::paginate(20)]);
    }

    public function item_edit($id){
        return view('item_edit')->with(["item" => Item::find($id)]);
    }

    public function item_update(Request $request, $id){
        $input = $request->all();
        if(isset($input['content'])){
            $input['content'] = Item::blockWords($input['content']);
        }
        if(isset($input['title'])){
            $input['title'] = Item::blockWords($input['title']);
        }

        if(!is_null(Item::find($id)) && Item::find($id)->update($input)){
            return view('item_edit')->with(["item" => Item::find($id), "info"=> "信息更新成功"]);
        }else{
            return view('item_edit')->with(["item" => Item::find($id), "info"=> "信息更新失败"]);
        }
    }

    public function item_delete($id){
        if(!is_null(Item::find($id)) && Item::find($id)->delete()){
            return redirect('/admin/item')->withCookie('info','封禁成功');
        }else{
            return redirect('/admin/item')->withCookie('info','封禁失败');
        }
    }

    public function words_edit(){
        $result = Setting::where(['name' => 'words'])->get();
        if(is_null($result) || $result->isEmpty()) {
            Setting::create(['name'=>'words', 'content' => '']);
            $result = '';
        }else{
            $result = $result->first()->content;
        }
        return view('words_edit')->with(['content' => $result]);
    }

    public function words_update(Request $request){
        $result = Setting::where(['name' => 'words'])->first();
        $input = $request->all();
        $result->update(["content"=>$input['content']]);
        return redirect('/admin/item/words');
    }

    public function login(){
        return view('login');
    }

    public function login_action(Request $request){
        $input = $request->all();
        $user = User::where(["phone" => $input['phone']])->get();
        if(!is_null($user) && !$user->isEmpty() && $user->first()->password == md5($input['password'].'yiban')){
            Auth::login($user->first());
            return redirect('/admin/user');
        } else {
            return redirect('/admin/login');
        }
    }

    public function logout_action(){
        Auth::logout();
        return redirect('/admin/login');
    }
}
