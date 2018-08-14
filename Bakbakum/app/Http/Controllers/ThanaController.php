<?php

namespace App\Http\Controllers;

use App\Thana;
use App\District;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thanas = Thana::all();
        return view('location.thana_create',compact('thanas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $thanas = new Thana;
        $thanas->name = $request->input('name');
        $thanas->save();
        $thanas = Thana::all();
        return view('location.thana_create', compact('thanas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function show(Thana $thana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function edit(Thana $thana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thana $thana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thana $thana)
    {
        //
    }
}
