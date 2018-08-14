<?php

namespace App\Http\Controllers;

use App\Divisions;
use App\District;
use App\Thana;
use Illuminate\Http\Request;
use Session;

class DivisionsController extends Controller
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
        $divisions = Divisions::all();
        $districts = District::all();
        return view('location.divisions_create')->withDivisions($divisions)->withDistricts($districts);
    }

    public function createDivisionsDistrict()
    {
        $divisions = Divisions::all();
        $districts = District::all();
        return view('location.divisions_district')->withDivisions($divisions)->withDistricts($districts);
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
        $districts = District::all();
        $divisions = new Divisions;
        $divisions->name = $request->input('name');
        $divisions->save();
        
        Session::flash('Success', 'Successfully Created Divisions');
        return redirect()->route('divisions/show', $divisions->id);
    }


    public function divisionsDistrictStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $districts = District::all();
        $divisions = new Divisions;
        $divisions->id = $request->input('name');
        //dd($divisions->id);
        // $divisions->save();

        // if(isset($request->district)){
        //     $divisions->district()->sync($request->district);
        // }else{
        //     $divisions->district()->sync(array());
        // }

        $divisions->district()->sync($request->district,false);
        
        Session::flash('Success', 'Successfully Created Divisions');
        return redirect()->route('divisions/show', $divisions->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Divisions  $divisions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$districts = District::all();
        $divisions = Divisions::find($id);
        return view('location.index', compact('divisions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisions  $divisions
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisions $divisions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisions  $divisions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisions $divisions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisions  $divisions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisions $divisions)
    {
        //
    }
}
