<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Brand;
use Illuminate\Http\Request;
use Session;
use Image;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
           $this->middleware('auth:admin');
     }

    public function index()
    {
      $brands = Brand::paginate(5);

      return view('admin.brands.index', ['brands' => $brands]);
      //return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validation
      $this->validate($request, array(
        'name' => 'required|max:255',
      )); //returns to request page if validation failed with the errors stored in the variable $errors

      // store in database
      $brand = new Brand;   //create new instance
      $brand->name = $request->name;
      $brand->description = $request->description;

      if($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/brands/' . $filename);
          Image::make($image)->resize(800,800)->save($location);
          $brand->image = $filename;
      }

      $brand->save();

      //send success message through session
      Session::flash('success', 'Brand created successfully!');
      //flash() is a var type inside session, exists for only a single user request
      //to store a var throughout the session use put()

      return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $brand = Brand::find($id);
      return view('admin.brands.show')->withBrand($brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $brand = Brand::find($id);
      return view('admin.brands.edit')->withBrand($brand);
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
        $this->validate($request, array(
          'name' => 'required|max:255'
        ));
        $brand = Brand::find($id);

        $brand->name = $request->input('name');
        $brand->description = $request->input('description');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $filename);
            Image::make($image)->resize(800,800)->save($location);
            $brand->image = $filename;
        }
        $brand->save();

        Session::flash('success', 'Brand updated successfully!');

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        try {
          $brand->delete();
          Session::flash('success', 'Brand deleted successfully!');
        }
        catch(QueryException $e) {
          Session::flash('warning', 'This Brand has one or more dependecies. Failed to perform the operation!');
          return redirect()->route('brands.index');
          //dd($e->getMessage());
        }

        return redirect()->route('brands.index');

    }
}
