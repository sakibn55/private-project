<?php

namespace App\Http\Controllers;
use App\Product;
use App\District;
use App\Divisions;
use App\Thana;
use App\Images;
use App\Categories;
use Illuminate\Http\Request;

class productController extends Controller
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
        $divisions = Divisions::all();
        $categories = Categories::all();
        return view('products.create', compact('divisions','categories'));
    }

    function findDivisionName(Request $request){
        $divisionId = $request->id;
        $data = Divisions::find($divisionId)->district()->orderBy('name')->get();

        return response()->json($data);
    }

    function findDistrictName(Request $request){
    $districtId = $request->id;
    $data = District::find($districtId)->thana()->orderBy('name')->get();

    return response()->json($data);
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
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }

         $images= new Images();
         $images->filename=json_encode($data);
         
        
        $images->save();

        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $images = Images::all();

      $images = json_decode($images,true);
        foreach ($images as $image){
           $items = $image['filename'];
           //print_r($items);
      }
     
      $items = json_decode($items);
      print_r($items);
      
         foreach ($items as $item) {
             echo"<img src='images/".$item."'/>";
         }
     
      
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
