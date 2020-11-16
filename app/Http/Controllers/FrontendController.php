<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use App\Deliver;

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

	public function customerregister($value='')
	{
		return view('frontend.customer_register');
	}

	public function deliverregister($value='')
	{
		return view('frontend.deliver_register');
	}

	public function customerstore(Request $request)
	{
		$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'business_type' => 'required',
        ]);

        if($request->file()){

            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAS('customerimg', $filename, 'public');

            $path = '/storage/'.$filepath;
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $customer = new Customer;
        $customer->user_id = $user->id;
        $customer->profile = $path;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = 0;
        $customer->business_type = $request->business_type;
        $customer->save();

        $user->assignRole('customer');

		return view('frontend.main');
	}

	public function deliverstore(Request $request)
	{
        //dd($request);
		$request-> validate([
            "name" => "required|min:5",
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'dob' => 'date_format:Y-M-D|before:today',
            'gender' =>'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'time' => 'required',
            // 'job' => 'required',
            // 'job_day' => 'required',
            // 'transport_type' => 'required',
            // 'payment_type' => 'required',
            
        ]);

         // If include file, upload
        if($request->file()) {
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            $filePath = $request->file('photo')->storeAs('deliverimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }
        

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $deliver = new Deliver;
        $deliver->user_id = $user->id;
        $deliver->profile = $path;
        $deliver->dob = $request->form;
        $deliver->gender = $request->gender;
        $deliver->phone = $request->phone;
        $deliver->address= $request->address;
        $deliver->job_type= $request->job;
        $deliver->job_day= $request->day;
        $deliver->job_time= $request->time;
        $deliver->transport_type = $request->transport;
        $deliver->payment_type= $request->payment;
        $deliver->status=0;
        $deliver->save();


        $user->assignRole('deliver');

        // Auth::login($user);
		return view('frontend.main');
	}
}
