<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::paginate(5);

      return view('admin.categories.index', ['categories' => $categories]);
      //return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
        'description' => 'required',
      )); //returns to request page if validation failed with the errors stored in the variable $errors

      // store in database
      $category = new Category;   //create new instance
      $category->name = $request->name;
      $category->description = $request->description;
      $category->save();

      //send success message through session
      Session::flash('success', 'Category created successfully!');
      //flash() is a var type inside session, exists for only a single user request
      //to store a var throughout the session use put()

      return redirect()->route('categories.index');
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
      $category = Category::find($id);
      return view('admin.categories.edit')->withCategory($category);
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
        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->image = $request->input('image');

        $category->save();

        Session::flash('success', 'Category updated successfully!');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        Session::flash('success', 'Category deleted successfully!');

        return redirect()->route('categories.index');

    }
}
