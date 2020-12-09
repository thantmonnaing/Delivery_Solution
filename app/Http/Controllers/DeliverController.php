<?php

namespace App\Http\Controllers;

use App\User;
use App\Deliver;
use App\Township;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliver=Deliver::where('status','!=',1)->get();
        return view('backend.deliver.index',compact('deliver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships=Township::all();
        return view('backend.deliver.create',compact('townships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        // dd($request);
        
        $request-> validate([
            "name" => "required|min:5",
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'dob' => 'before:today|required',
            'gender' =>'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'start_time' => 'sometimes|required|nullable',
            'end_time' => 'sometimes|required|nullable',
            'township' => 'required',
            'job' => 'required',
            'day' => 'required',
            'transport' => 'required',
            'payment' => 'required',
            
        ]);

         // If include file, upload
        $townships = implode(',',$request->township);
        $days = implode(',', $request->day);
        $payments = implode(',', $request->payment);

        if($request->start_time!=null && $request->end_time !=null){
            $time = $request->start_time.",".$request->end_time;
        }else{
            $time = 'null';
        }

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
        $deliver->dob = $request->dob;
        $deliver->gender = $request->gender;
        $deliver->phone = $request->phone;
        $deliver->address= $request->address;
        $deliver->job_type= $request->job;
        $deliver->job_day= $days;
        $deliver->job_time= $time;
        $deliver->transport_type = $request->transport;
        $deliver->payment_type= $payments;
        $deliver->status=0;
        $deliver->save();        

        $user->assignRole('deliver');

        foreach ($request->township as $row) {

            $deliver->townships()->attach($row);          
        }

        return redirect()->route('deliver.index');
         

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deliver  $deliver
     * @return \Illuminate\Http\Response
     */
    public function show(Deliver $deliver)

    {   
        //dd($deliver);
        return view('backend.deliver.show',compact('deliver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deliver  $deliver
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliver $deliver)
    {           
        $deliver->job_day = explode(',',$deliver->job_day);
        $deliver->payment_type = explode(',', $deliver->payment_type);

        if($deliver->job_time != 'null'){
            $time_arr = explode(',', $deliver->job_time);
            $deliver->start_time = $time_arr[0];
            $deliver->end_time = $time_arr[1];
        }else{
            $deliver->start_time = '';
            $deliver->end_time = '';
        }
        // dd($deliver);
        $townships=Township::all();
        return view('backend.deliver.edit',compact('deliver','townships'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deliver  $deliver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliver $deliver)
    {
        //dd($request);
        //validation
        $request-> validate([
            "name" => "required|min:5",
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'required|mimes:jpeg,jpg,png',
            'dob' => 'date_format:Y-M-D|before:today',
            'gender' =>'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'time' => 'sometimes|required',
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
        }else{
            $path = $request->oldphoto;
        }


        //data store
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
        
        $deliver->save();

        $user->assignRole('deliver');

        Auth::login($user);

        return redirect()->route('deliver.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deliver  $deliver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deliver $deliver)
    {
        $deliver->delete();
        return redirect()->route('deliver.index');
    }

    public function block($id)
    {
        Deliver::where('id',$id)
                ->update(['status'=>1]);
        return redirect()->route('deliver.index');
    }

    public function unblock($id)
    {        
        Deliver::where('id',$id)
                ->update(['status'=>0]);
        return redirect()->route('blacklist');
    }
}
