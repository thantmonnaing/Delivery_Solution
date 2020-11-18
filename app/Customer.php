<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id','profile','phone','address','business_type','status',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');

    }

    public function orders()
    {
    	return $this->belongsTo('App\Order');

    }
}
