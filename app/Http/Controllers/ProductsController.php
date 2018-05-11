<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use App\Product;
use App\Category;
use App\Subcategory;
use App\Attribute;
use App\Attributeset;
use Illuminate\Http\Request;
use Session;
use Image;

class ProductsController extends Controller
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
        $products = Product::paginate(5);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.products.create');
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
          'purchase_price' => 'required',
          'stock' => 'required',
          'type' => 'required',
        )); //returns to request page if validation failed with the errors stored in the variable $errors

        // store in database
        $product = new Product;   //create new instance
        $product->name = $request->name;
        $product->description = $request->description;
        $product->purchase_price = $request->purchase_price;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->stock = $request->stock;
        // $product->category_id = $request->category_id;
        // $product->subcategory_id = $request->subcategory_id;
        $type_result = explode('|',$request->type);
        $product->category_id = $type_result[0];
        $product->subcategory_id = $type_result[1];
        $product->brand_id = $request->brand_id;
        $product->active = $request->active;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $filename);
            Image::make($image)->resize(800,800)->save($location);
            $product->image = $filename;
        }
        $product->save();

        $product_id = $product->id;
        //send success message through session
        //Session::flash('success', 'Product created successfully!');
        //flash() is a var type inside session, exists for only a single user request
        //to store a var throughout the session use put()

        $attribute = Attribute::where('subcategory_id',$product->subcategory_id)->exists();
        if($attribute == 1) {
          return redirect()->route('products.attribute', ['$subcategory_id' => $product->subcategory_id, 'product_id' => $product_id]);
        }
        else {
          return redirect()->route('products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $product = Product::find($id);
          return view('admin.products.edit')->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
          'name' => 'required|max:255',
          'purchase_price' => 'required',
          'stock' => 'required',
          'type' => 'required',
        )); //returns to request page if validation failed with the errors stored in the variable $errors

        // store in database
        $product = Product::find($id);   //create new instance
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->purchase_price = $request->input('purchase_price');
        $product->price = $request->input('price');
        $product->tax = $request->input('tax');
        $product->stock = $request->input('stock');
        // $product->category_id = $request->category_id;
        // $product->subcategory_id = $request->subcategory_id;
        $type_result = explode('|',$request->input('type'));
        $product->category_id = $type_result[0];
        $product->subcategory_id = $type_result[1];
        $product->brand_id = $request->input('brand_id');
        $product->active = $request->input('active');
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/products/' . $filename);
            Image::make($image)->resize(800,800)->save($location);
            $product->image = $filename;
        }
        $product->save();

        Session::flash('success', 'Product updated successfully!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
          $product->delete();
          Session::flash('success', 'Product deleted successfully!');
        }
        catch(QueryException $e) {
          Session::flash('warning', 'Product has one or more dependencies. Failed to perform the operation!');
          return redirect()->route('products.index');
          //dd($e->getMessage());
        }
        return redirect()->route('products.index');
    }
    public function attribute($subcategory_id, $product_id)
    {
        $attribute = Attribute::where('subcategory_id', $subcategory_id)->get();
        if(empty($attribute)) {
          return redirect()->route('products.index');
        } else {
          return view('admin.products.attribute', ['attributes' => $attribute, 'product_id' => $product_id]);
        }
    }
    public function store_attribute(Request $request, $product_id)
    {
        $attributeSet = new Attributeset;

        $collection1 = $request->input('value');
        $collection2 = $request->input('attribute_id');
        foreach (array_combine($collection1,$collection2) as $value => $id) {
            $attributeset = new Attributeset;
            $attributeset->value = $value;
            $attributeset->attribute_id = $id;
            $attributeset->product_id = $product_id;
            $attributeset->save();
        }
        return redirect()->route('products.index');
    }
}
