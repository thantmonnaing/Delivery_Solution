<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use App\Deliver;
use App\Township;
use App\Order;
use App\Way;

class FrontendController extends Controller
{
    public function index($value='')
	{
        $townships = Township::all();
		return view('frontend.main',compact('townships'));
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

		return redirect()->route('main');
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
            //'job' => 'required',
            // 'job_day' => 'required',
            // 'transport_type' => 'required',
            //'payment' => 'required',
            
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
		return redirect()->route('main');
	}

    public function logout($value='')
    {
        Auth::logout();
        return view('frontend.main');
    }

    public function order($value='')
    {        
        $townships = Township::all();
        return view('frontend.order',compact('townships'));
    }

    public function orderstore(Request $request)
    {     
        // dd($request);
        $myways = json_decode($request->way);
        $notes = $request->notes;
        $payment = $request->payment;
        $orderdate = date('Y-m-d');

        foreach ($myways as $row) { 
            $way = new Way;
            $way->item_name = $row->item_name;
            $way->township_id = $row->township_id;
            $way->address = $row->receiver_address;
            $way->phone = $row->receiver_phone;
            $way->item_weight = $row->item_weight;
            $way->receiver_name = $row->receiver_name;
            $way->save();
        }

        $customer = Customer::where('user_id',Auth::user()->id)->get();
        $order = new Order;
        $order->order_no = uniqid();
        $order->order_date = $orderdate;
        foreach ($customer as $row) { 
            $order->customer_id =  $row->id;
        }               
        $order->payment_type = $payment;
        $order->status = 0;
        $order->notes = $notes;// current logined user_id
        $order->save();

        $ways = Way::all();
        foreach ($ways as $row) { 
            $township = Township::where('id',$row->township_id)->get();
            foreach ($township as $t_row) { 
                $order->ways()->attach($row->id,['total_amount'=>$t_row->price]);
            }            
        }

        // ajax response
        return response()
            ->json(['msg' => 'Successful You Order!']);
        
    }


    public function addway(Request $request){

        $id = $request->township;
        $township = Township::where('id',$id)->get();
        return $township;
    }

     public function about($value='')
    {        
        return view('frontend.about');
    }
}
