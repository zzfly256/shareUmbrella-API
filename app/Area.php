<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $fillable = [
        'area_name'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function items(){
        return Item::select(
            'areas.area_name',
            'users.usernick',
            'items.*'
        )
            ->where(['items.area_id' => $this->id])
            ->join('areas','items.area_id','=','areas.id')
            ->join('users','items.user_id','=','users.id')
            ->get();
    }
}
