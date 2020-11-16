<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Deliver;

class BackendController extends Controller
{
    public function home($value='')
	{
		return view('backend.backend_template');
	}

	public function signup($value='')
	{
		return view('welcome');
	} 

	public function blacklist($value='')
	{
		$customers= Customer::where('status', 1)->get();
		$delivers= Deliver::where('status', 1)->get();
		return view('backend.blacklists',compact('customers','delivers'));
	} 
}
