<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
use Session;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $categories = Category::all();
        return view('admin.subcategories.create', ['categories' => $categories]);
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

        //send success message through session
        Session::flash('success', 'Subcategory created successfully!');
        //flash() is a var type inside session, exists for only a single user request
        //to store a var throughout the session use put()

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
