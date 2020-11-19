<?php

namespace App\Http\Controllers;

use App\Order;
use App\Deliver;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $order_pending = Order::where('status',0)->get();
        $order_confirm = Order::all();
        return view('backend.order.index',compact('order_pending','order_confirm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $delivers = Deliver::all();
        return view('backend.order.show',compact('order','delivers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index');
    }

    public function getdeliver(Request $request)
    {
        $deliver_id = $request->deliver_id;
        $deliver = Deliver::find($deliver_id);
        $user = $deliver->user;

        return response()
            ->json(['deliver' => $deliver]);
    }

    public function confirm(Request $request)
    {
        // dd($request);

        Order::where('id', $request->order_id)
                  ->update(['status' => 1]);
                  
        $deliver_id = $request->deliver_id;
        $order = Order::find($request->order_id);

        $order->delivers()->attach($deliver_id,['date'=>date('Y-m-d'),'status'=>0]);

        return response()
            ->json(['msg' => "Successful pair order and deliver!"]);
    }
}
