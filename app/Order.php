<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no','order_date','customer_id','payment_type','status','notes',
    ];

    public function ways(){
    	return $this->belongsToMany('App\Way','orderdetails')
    			    ->withPivot('total_amount')
    			    ->withTimestamps();

    }

    public function delivers(){
        return $this->belongsToMany('App\Deliver','pairs')
                    ->withPivot('date','status')
                    ->withTimestamps();

    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');

    }
}
