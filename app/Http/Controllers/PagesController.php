<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Brand;
use App\Attributeset;
use App\Shoppingcart;
use App\Order;
use App\User;
use App\Wishlist;
use App\Review;
use App\Offer;

use Auth;
use Illuminate\Http\Request;
use Mail;
use Session;

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
          $offers = Offer::all();
          return view('website.index', ['offers' => $offers]);
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
          $offers = Offer::all();
          return view('website.product',['product' => $product, 'attributesets' => $attributesets]);
      }

      public function checkout()
      {
          if(Order::where([['user_id',Auth::user()->id],['status',1]])->exists()) //1 for unplaced order
          {
              $order = Order::where([['user_id',Auth::user()->id],['status',1]])->first();
              $order_id = $order->id;
              //dd($order->id);
              $shoppingcarts = Shoppingcart::select('shoppingcarts.id as id','shoppingcarts.product_id', 'shoppingcarts.quantity', 'shoppingcarts.price', 'shoppingcarts.order_id',
               'products.name','products.image')->join('products', 'shoppingcarts.product_id', '=', 'products.id')->where('order_id' , $order_id)->get();
              //$cart = 1;
              $total = 0;
              foreach ($shoppingcarts as $shoppingcart) {
                  $total = $total + ($shoppingcart->price * $shoppingcart->quantity);
              }
              return view('website.checkout', ['shoppingcarts' => $shoppingcarts])->withTotal($total)->withOrderid($order_id);
          }
          else {
            //sdd('hi!');
              $cart = 0;
              return view('website.cart')->withCart($cart);
          }
          //return view('website.checkout');
      }

      public function placeorder(Request $request)
      {
        $this->validate($request, array(
          'shipping_address' => 'required',
          'mobile_no' => 'required',
          'order_id' => 'required'
        ));
        //dd($request->input('order_id'));
        $order_id = $request->input('order_id');
        $order = Order::find($order_id);
        $order->shipping_address = $request->input('shipping_address');
        $order->mobile_no = $request->input('mobile_no');
        $order->status = 1;
        $order->save();

        $bodyMessage = "";
        $shoppingcarts = Shoppingcart::where('order_id',$order_id)->get();

        foreach ($shoppingcarts as $shoppingcart) {
            $product = Product::find($shoppingcart->product_id);
            $product->stock = $product->stock - $shoppingcart->quantity;
            $product->save();

            $bodyMessage = $bodyMessage."Product name: ".$product->name." Quantity: ".$shoppingcart->quantity." Price: ".$shoppingcart->price."\n";
        }

        //dd($bodyMessage);
        Session::flash('success', 'Your order has been placed. A recipt was sent to your email. Thank you!');

        $user = User::find(Auth::user()->id);
        $data = array(
          'bodyMessage' => $bodyMessage,
          'email' => $user->email,
        );

        Mail::send('website.receipt', $data, function($message) use ($data) {
          $message->from('admin@damkoto.com');
          $message->to($data['email']);
          $message->subject("Receipt for order at Dam Koto");
        });

        return redirect()->route('home');
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

      public function search(Request $request)
      {
          $search = $request->input('search');
          $type = $request->input('type');

          if($type <> 0) {
            $type_result = explode('|',$request->input('type'));
            $category_id = $type_result[0];
            $subcategory_id = $type_result[1];
            //dd($category_id);
            $products = Product::where([['category_id',$category_id],['subcategory_id',$subcategory_id]])->get();

          } else {
            $products = Product::all();
          }
          foreach ($products as $product) {
              if($matches = str_contains($product->name,$search)) {
                return view('website.search')->withData($product);
              } else {
                return view('website.search')->withData(null);
              }
          }
      }
      public function wishlist()
      {
          $this->middleware('auth:web');
          $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
          return view('website.wishlist',['wishlists' => $wishlist]);
      }
      public function addWishlist($id)
      {
          $this->middleware('auth:web');
          $wishlist = Wishlist::where([['product_id', $id],['user_id', Auth::user()->id]])->get();
          if(count($wishlist) == 0)
          {
             $data = new Wishlist;
             $data->user_id = Auth::user()->id;
             $data->product_id = $id;
             $data->save();
             Session::flash('success', 'Product added to the Wishlist!');
             return back();
          } else {
            Session::flash('warning', 'Product already in the Wishlist!');
            return back();
          }
      }

      // public function removeWishlist($id)
      // {
      //     $this->middleware('auth:web');
      //     $wishlist = Wishlist::where([['product_id', $id],['user_id', Auth::user()->id]])->get();
      //     if(count($wishlist) == 0)
      //     {
      //        $data = new Wishlist;
      //        $data->user_id = Auth::user()->id;
      //        $data->product_id = $id;
      //        $data->save();
      //        Session::flash('success', 'Product added to the Wishlist!');
      //        return back();
      //     } else {
      //       Session::flash('warning', 'Product already in the Wishlist!');
      //       return back();
      //     }
      // }

      public function addReview(Request $request)
      {
          $this->middleware('auth:web');
          $this->validate($request, [
              'rating' => 'required',
          ]);

          //dd($request->product_id);
          $review = Review::where([['product_id', $request->product_id],['user_id', Auth::user()->id]])->get();
          if(count($review) == 0)
          {
            $data = new Review;
            $data->rating = $request->input('rating');
            $data->description = $request->input('description');
            $data->user_id = Auth::user()->id;
            $data->product_id = $request->product_id;
            $data->save();
            Session::flash('success', 'You have reviewed this product!');
            return back();
          }
          else {
            Session::flash('warning', 'You have already reviewed this product!');
            return back();
          }

      }

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
