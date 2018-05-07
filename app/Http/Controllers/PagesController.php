<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Attributeset;
use Illuminate\Http\Request;

class PagesController extends Controller
{
      protected $categories, $subcategories;
      public function index()
      {
          return redirect()->route('home');
      }
      public function homepage()
      {
          return view('website.index');
      }
      public function category($category_id)
      {
          $category_name = Category::find($category_id);
          $data = Product::where([['category_id',$category_id],['active',1]])->get();
          return view('website.category', ['data' => $data])->with('category_id', $category_id)->with('category_name', $category_name);
      }
      public function product($product_id)
      {
          $product = Product::find($product_id);
          $attributesets = Attributeset::where('product_id',$product_id)->get();
          return view('website.product',['product' => $product, 'attributesets' => $attributesets]);
      }
}
