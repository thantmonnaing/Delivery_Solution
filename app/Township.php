<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'name','codeno','price',
    ];

    public function ways(){
    	return $this->hasMany('App\Way');
    }
}
