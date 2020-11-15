<?php

namespace App\Http\Controllers;

use App\Township;
use Illuminate\Http\Request;

class TownshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $township=Township::all();
        return view('backend.township.index',compact('township'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.township.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request-> validate([
            "name" => "required|min:5",
            "price" => "required",
        ]);

        // store
        $township = new Township;
        $township->codeno = uniqid();
        $township->name = $request->name;
        $township->price= $request->price;
        $township->save();

         return redirect()->route('township.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function show(Township $township)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function edit(Township $township)

    {   
        //dd($township);
        return view('backend.township.edit',compact('township'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Township $township)
    {
        //validation
        $request-> validate([
            "name" => "required|min:5",
            "price" => "required",
        ]);

        // store
        
        $township->codeno = uniqid();
        $township->name = $request->name;
        $township->price= $request->price;
        $township->save();

         return redirect()->route('township.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Township  $township
     * @return \Illuminate\Http\Response
     */
    public function destroy(Township $township)
    {
        $township->delete();
        return redirect()->route('township.index');
    }
}
