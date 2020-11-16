<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index($value='')
	{
		return view('frontend.main');
	}

	public function login($value='')
	{
		return view('frontend.login');
	}
}
