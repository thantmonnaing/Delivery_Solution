<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $fillable = [
        'user_id','profile','dob','gender','phone','address','job_type','job_day','job_time','transport_type','payment_type','status',
    ];
}
