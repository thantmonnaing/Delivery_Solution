<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers= Customer::where('status','!=', 1)->get();
        return view('backend.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
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

        Auth::login($user);

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('backend.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // dd($request);


        // dd($customer);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'photo' => 'sometimes|required|mimes:jpeg,jpg,png',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'business_type' => 'required',
            'oldphoto'=> 'required',
            'user_id'=> 'required',
            'status'=> 'required',
        ]);

        if($request->file()){

            if(file_exists(public_path($request->oldphoto))){
                unlink(public_path($request->oldphoto));
            }              

            $filename = time().'_'.$request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAS('customerimg', $filename, 'public');

            $path = '/storage/'.$filepath;
        }else{
            $path = $request->oldphoto;
        }

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $customer->user_id = $request->user_id;
        $customer->profile = $path;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->business_type = $request->business_type;
        $customer->save();


        return redirect()->route('customer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if(file_exists(public_path($customer->profile))){
            unlink(public_path($customer->profile));
        }        

        // $user = User::find($customer->user_id);
        // $user->delete();
        User::where('id',$customer->user_id)->delete();
        return redirect()->route('customer.index');
    }

    public function block($id)
    {
        Customer::where('id', $id)
                  ->update(['status' => 1]);
        return redirect()->route('customer.index');
    }
}
