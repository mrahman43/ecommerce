<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Brand;
use App\Attributeset;
use App\Shoppingcart;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Mail;


class PagesController extends Controller
{
      protected $categories, $subcategories;

      public function __construct()
      {
        // $cartcount = 0;
        // $carttotal = 0;
        // if(Order::where([['user_id',Auth::user()->id],['status',1]])->exists()) //1 for unplaced order
        // {
        //     $order = Order::where([['user_id',Auth::user()->id],['status',1]])->first();
        //     $order_id = $order->id;
        //     $shoppingcarts = Shoppingcart::where('order_id' , $order_id)->get();
        //
        //     foreach ($shoppingcarts as $shoppingcart) {
        //         $cartcount++;
        //         $carttotal = $carttotal + ($shoppingcart->price * $shoppingcart->quantity);
        //     }
        //       //return view('website.cart', ['shoppingcarts' => $shoppingcarts])->withCart($cart);
        // }
        // view()->share('cartcount', $cartcount);
        // view()->share('carttotal', $carttotal);
      }

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
          $brand_id =  Product::where([['category_id',$category_id],['active',1]])->distinct()->get();
          $brands = Brand::where('id', $brand_id);
          return view('website.category', ['data' => $data, 'brands' => $brands])->with('category_id', $category_id)->with('category_name', $category_name);
      }
      public function product($product_id)
      {
          $product = Product::find($product_id);
          $attributesets = Attributeset::where('product_id',$product_id)->get();
          return view('website.product',['product' => $product, 'attributesets' => $attributesets]);
      }

      public function checkout()
      {
          return view('website.checkout');
      }

      // public function order()
      // {
      //     if(Order::where([['user_id',Auth::user()->id],['status',1]])->exists()) //1 for unplaced order
      //     {
      //         $order = Order::where([['user_id',Auth::user()->id],['status',1]])->first();
      //         $order_id = $order->id;
      //         $shoppingcarts = Shoppingcart::where('order_id' , $order_id)->get();
      //         return view('website.cart', ['shoppingcarts', $shoppingcarts]);
      //     }
      //     //dd('new');
      // }

      public function getMail()
      {
          return view('admin.sendmail');
      }
      public function postMail(Request $request)
      {
          $this->validate($request, [
              'subject' => 'required',
              'message' => 'required'
          ]);
          $data = array(
            //'email'
            'subject' => $request->subject,
            'bodyMessage' => $request->message
          );
          Mail::send('admin.emails.offers', $data, function($message) use ($data) {
            $message->from('damkoto@gmail.com');
            $message->to('shadmanrashik@gmail.com');
            $message->subject($data['subject']);
          });

      }

}
