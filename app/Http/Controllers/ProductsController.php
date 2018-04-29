<?php

namespace App\Http\Controllers;

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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.products.create', ['categories' => $categories], ['subcategories' => $subcategories]);
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
          'category_id' => 'required',
          'subcategory_id' => 'required',
        )); //returns to request page if validation failed with the errors stored in the variable $errors

        // store in database
        $product = new Product;   //create new instance
        $product->name = $request->name;
        $product->description = $request->description;
        $product->purchase_price = $request->purchase_price;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
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

        return redirect()->route('products.attribute', ['$subcategory_id' => $product->subcategory_id, 'product_id' => $product_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
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
