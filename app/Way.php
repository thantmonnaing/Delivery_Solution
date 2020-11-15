<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    protected $fillable = [
        'item_name','township_id','address','phone','item_weight','reciver_name',
    ];
}
