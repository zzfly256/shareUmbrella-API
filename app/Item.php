<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title', 'content', 'coordinate', 'area_id', 'tags', 'user_id'
    ];
    protected $table = 'items';
}
