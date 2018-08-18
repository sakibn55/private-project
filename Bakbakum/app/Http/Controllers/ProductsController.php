<?php

namespace App\Http\Controllers;

use App\Products;
use App\District;
use App\Divisions;
use App\Thana;
use App\Images;
use App\Categories;
use App\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
        $userId = Auth()->id();
        $this->validate($request, [
            'title' =>'required',
            'categories' => 'required',
            'district' => 'required',
            'division' => 'required',
            'thana' => 'required',
            'color' => 'required',
            'age' => 'required',
            'name' => 'required',
            'number' => 'required',
            'description' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $products = new Products;
        $products->title = $request->input('title'); 
        $products->color = $request->input('color'); 
        $products->age = $request->input('age'); 
        $products->name = $request->input('name'); 
        $products->number = $request->input('number'); 
        $products->description = $request->input('description'); 
        $products->created = date('Y-m-d H:i:s');
        $products->product_for_img = "1";

        $products->save();



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
         
        $divisions = new Divisions;
        $images->save();
        $imageId = $images->id;
        
        //$products->division()->sync($request->division);
        $products->categories()->sync($request->categories,false);
        $products->district()->sync($request->district,false);
        $products->images()->sync($imageId,false);
        $products->thana()->sync($request->thana,false);
        $products->user()->sync($userId,false);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
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
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
