<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    protected $fillable = [
        'title', 'content', 'coordinate', 'area_id', 'tags', 'user_id'
    ];
    protected $table = 'items';

    public static function getAllItem(){
        return Item::select(
            'users.usernick',
            'areas.area_name',
            'items.*'
            )
            ->join('areas','items.area_id','=','areas.id')
            ->join('users','items.user_id','=','users.id')
            ->get();
    }

    public static function getItem($id){
        return Item::select(
            'users.usernick',
            'areas.area_name',
            'items.*'
            )
            ->where(['items.id' => $id])
            ->join('areas','items.area_id','=','areas.id')
            ->join('users','items.user_id','=','users.id')
            ->get();
    }

    public static function searchItem($table,$target, $string) {
        if ($table == 'users'){
            return DB::table($table)->where($target, 'LIKE', '%'.$string.'%')
                ->select(
                    'users.usernick',
                    'areas.area_name',
                    'items.*'
                )
                ->join('items','items.user_id','=','users.id')
                ->join('areas','items.area_id','=','areas.id')
                ->get();
        } else {
            return DB::table($table)->where($target, 'LIKE', '%'.$string.'%')
                ->select(
                    'users.usernick',
                    'areas.area_name',
                    'items.*'
                )
                ->join('areas','items.area_id','=','areas.id')
                ->join('users','items.user_id','=','users.id')
                ->get();
        }
    }
    public static function getNearbyItem($longitude, $latitude){
        $array = Item::select(
            'users.usernick',
            'areas.area_name',
            'items.*'
            )
            ->join('areas','items.area_id','=','areas.id')
            ->join('users','items.user_id','=','users.id')
            ->get();
        $result = [];
        foreach ($array as $value) {
            $coordinate = explode(',',$value->coordinate);
            // 两点之间距离公式
            $distance = (string)sqrt( abs(pow($coordinate[0] - $longitude,2) - pow($coordinate[1] - $latitude,2) ));
            $value = $value->toArray();
            $value['distance'] = $distance;
            array_push($result,$value);
        }
        array_multisort(array_column($result,'distance'),SORT_ASC,$result);
        return $result;
    }
    public static function blockWords($string){
        $result = Setting::where(['name' => 'words'])->get();
        if(is_null($result) || $result->isEmpty()) {
            Setting::create(['name'=>'words', 'content' => '']);
            $result = '';
        }else{
            $result = $result->first()->content;
        }

        $array = explode(",", $result);
        foreach ($array as $value) {
            $string = str_replace($value,"**",$string);
        }

        return $string;
    }
}
