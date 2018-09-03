<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid', 'username', 'usernick', 'usersex', 'wechat', 'major', 'qq', 'phone', 'deleted_at', 'level', 'password'
    ];
    protected $table = 'users';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['delete_at'];

    public static function decodeInfo($code){
        $postObject = @addslashes($code);
        $postStr = pack("H*", $postObject);
        $appID = "ca605d44857848cd";//应用appID
        $appSecret = "8990b32e39598349001e5a6eec14c001";//应用appSecret
        $postInfo = @mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $appSecret, $postStr, MCRYPT_MODE_CBC, $appID);
        return json_decode(rtrim($postInfo))->visit_user;
    }

    public static function loginByYiban($postInfo){
        //dd((array)$postInfo);
        $user = User::where(["userid" => $postInfo->userid])->get();

        if($user->isEmpty()){
            $user = User::create((array)$postInfo);
        } else {
            $user = $user->first();
        }

        Auth::login($user);
        return $user;
    }

    public function items(){
        return Item::select(
            'items.*',
            'areas.area_name',
            'users.usernick'
            )
            ->where(['items.user_id' => $this->id])
            ->join('areas','items.area_id','=','areas.id')
            ->join('users','items.user_id','=','users.id')
            ->get();
    }
}
