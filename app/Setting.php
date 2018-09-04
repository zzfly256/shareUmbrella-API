<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setings';
    protected $fillable = [
        'name', 'content'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
