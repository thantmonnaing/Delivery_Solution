<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $fillable = [
        'user_id','profile','dob','gender','phone','address','job_type','job_day','job_time','transport_type','payment_type','status',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');

    }

    public function orders(){
        return $this->belongsToMany('App\Order','pairs')
                    ->withPivot('date','status')
                    ->withTimestamps();

    }

    public function townships(){
    	return $this->belongsToMany('App\Township','delivertownships', 'townships_id', 'delivers_id');
    			    
    }
}
