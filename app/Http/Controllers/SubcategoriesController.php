<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Category;
use App\Subcategory;
use App\Attribute;
use Illuminate\Http\Request;
use Session;

class SubcategoriesController extends Controller
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
        $subcategories = Subcategory::paginate(5);

        return view('admin.subcategories.index', ['subcategories' => $subcategories]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
          'name' => 'required|max:255',
          'category_id' => 'required',
        )); //returns to request page if validation failed with the errors stored in the variable $errors

        // store in database
        $subcategory = new Subcategory;   //create new instance
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();


        if(!empty($request->attribute)){
          foreach ($request->attribute as $value) {
            $attribute = new Attribute;
            $attribute->subcategory_id = $subcategory->id;
            $attribute->name = $value;
            $attribute->save();
          }
        }
        //send success message through session
        //flash() is a var type inside session, exists for only a single user request
        //to store a var throughout the session use put()
        Session::flash('success', 'Subcategory created successfully!');


        return redirect()->route('subcategories.index');
    }
    // public function attribute(Request $request, $id)
    // {
    //     // $this->validate($request, array(
    //     //   'name' => 'required|max:255',
    //     //   'category_id' => 'required',
    //     // )); //returns to request page if validation failed with the errors stored in the variable $errors
    //
    //     // store in database
    //     $attribute = new Attribute;   //create new instance
    //     $attribute->name = $request->name;
    //     $attribute->subcategory_id = $id;
    //     $attribute->save();
    //
    //     //send success message through session
    //     Session::flash('success', 'Subcategory created successfully!');
    //     //flash() is a var type inside session, exists for only a single user request
    //     //to store a var throughout the session use put()
    //
    //     return redirect()->route('subcategories.index');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $subcategory = Subcategory::find($id);
          return view('admin.subcategories.show')->withSubcategory($subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::find($id);
        $attributes = Attribute::where('subcategory_id','=', $id)->get();
        return view('admin.subcategories.edit', ['categories'=> $categories, 'subcategory' => $subcategories, 'attributes' => $attributes]);
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
          'name' => 'required|max:255',
          'category_id' => 'required',
        ));
        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/subcategories/' . $filename);
            Image::make($image)->resize(800,800)->save($location);
            $subcategory->image = $filename;
        }
        $subcategory->category_id = $request->input('category_id');
        $subcategory->save();


        $collection1 = $request->input('attribute_id');
        $collection2 = $request->input('attribute_name');
        if(!empty($collection1)) {
        foreach (array_combine($collection1,$collection2) as $id => $name) {
          $attribute = Attribute::find($id);
          // if(count($attribute->id) <> 0) {
          $attribute->name = $name;
          $attribute->save();
          // } else {
          //   $attribute = new Attribute;
          //   $attribute->subcategory_id = $subcategory->id;
          //   $attribute->name = $name;
          //   $attribute->save();
          // }
        }
      }
        Session::flash('success', 'Category updated successfully!');

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        try {
          $subcategory->delete();
          Session::flash('success', 'Subcategory deleted successfully!');
        }
        catch(QueryException $e) {
          Session::flash('warning', 'Category has one or more dependencies. Failed to perform the operation!');
          return redirect()->route('subcategories.index');
          //dd($e->getMessage());
        }
        return redirect()->route('subcategories.index');
    }

    // public function delete_attribute($attribute_id)
    // {
    //     $attribute = Attribute::find($attribute_id);
    //     try {
    //       $attribute->delete();
    //       Session::flash('success', 'Attribute deleted successfully!');
    //     }
    //     catch(QueryException $e) {
    //       Session::flash('warning', 'Failed to perform the operation!');
    //       return redirect()->back();
    //       //dd($e->getMessage());
    //     }
    //     return redirect()->back();
    // }
}
