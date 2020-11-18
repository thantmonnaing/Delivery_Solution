<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'name','codeno','price',
    ];


    public function delivers(){
    	return $this->belongsToMany('App\Deliver','delivertownships', 'townships_id', 'delivers_id');
    }	
    			    

    public function ways(){
    	return $this->hasMany('App\Way');

    }
}
