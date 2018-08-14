<?php

namespace App\Http\Controllers;

use App\District;
use App\Thana;
use Illuminate\Http\Request;
use Session;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.district_create');
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
        $district = new District;
        $district->name = $request->input('name');
        $district->save();
        Session::flash('Success', 'Successfully Created District');
        return view('location.district_create');
    }
    public function createDistrictThana(){
        $thanas = Thana::all();
        $districts = District::all();
        return view('location.district_thana')->withThanas($thanas)->withDistricts($districts);
    }

    public function DistrictThanaStore(Request $request){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $thanas = Thana::all();
        $districts = new District;
        $districts->id = $request->input('name');
        $districts->thana()->sync($request->thana,false);
        
        Session::flash('Success', 'Successfully Created Divisions');
        return redirect()->route('districts/show', $districts->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = District::find($id);
        return view('location.district', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        //
    }
}
