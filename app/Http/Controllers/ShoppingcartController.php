<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoppingcart;
use App\Order;
use App\Product;
use App\Offer;
use Auth;
use Session;

class ShoppingcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
          $this->middleware('auth:web');
    }

    public function index()
    {
        if(Order::where([['user_id',Auth::user()->id],['status',1]])->exists()) //1 for unplaced order
        {
            //dd('hi!');
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
            return view('website.cart', ['shoppingcarts' => $shoppingcarts])->withTotal($total);
        }
        else {
          //sdd('hi!');
            $cart = 0;
            return view('website.cart')->withCart($cart);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return view('website.index');
        //dd($request->product_id);
        $this->validate($request, array(
          'product_id' => 'required',
          'quantity' => 'required',
        ));
        //$order = Order::where([['user_id',Auth::user()->id],['status',1]])->first(); //1 for unplaced order
        //$order_id = $order->id;
        if(Order::where([['user_id',Auth::user()->id],['status',1]])->exists())
        {
            $order = Order::where([['user_id',Auth::user()->id],['status',1]])->first();
            $order_id = $order->id;
            //dd(Auth::user()->id);
            //$oldcart = Shoppingcart::where([['order_id',$order_id],['product_id',$request->product_id]])->first();
            if(Shoppingcart::where([['order_id',$order_id],['product_id',$request->product_id]])->exists())
            {
                //dd($oldcart);
                //$oldcart = Shoppingcart::where([['order_id',$order_id],['product_id',$request->product_id]])->first();
                $oldcart = Shoppingcart::find($oldcart->id);
                $oldcart->quantity = $oldcart->quantity + $request->quantity;
                $oldcart->save();
            } else {
                $shoppingcart = new Shoppingcart;
                $shoppingcart->product_id = $request->product_id;
                $shoppingcart->quantity = $request->quantity;
                $product_prices = Product::find($request->product_id);
                //$product_price = $product_prices->pluck('price');
                $shoppingcart->price = $product_prices->price;

                // $special_product_prices = Offer::where('product_id',$request->product_id);
                // $special_product_price = $special_product_prices->pluck('reduction');
                //$shoppingcart->price = $product_price - $special_product_price;
                $shoppingcart->order_id = $order_id;
                $shoppingcart->save();
            }
        } else {
            //dd('nwe');
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 1;
            $order->save();
            $shoppingcart = new Shoppingcart;
            $shoppingcart->product_id = $request->product_id;
            $shoppingcart->quantity = $request->quantity;
            $product_prices = Product::find($request->product_id);
            //$product_price = $product_prices->pluck('price');
            $shoppingcart->price = $product_prices->price;

            // $special_product_prices = Offer::where('product_id',$request->product_id);
            // $special_product_price = $special_product_prices->pluck('reduction');
            //$shoppingcart->price = $product_price - $special_product_price;
            $shoppingcart->order_id = $order->id;
            $shoppingcart->save();
        }
        return redirect()->route('cart.index');
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
    // public function destroy($id)
    // {
    //       dd('hi!');
    // }
    public function delete($id)
    {
      $shoppingcart = Shoppingcart::find($id);
      try {
        $shoppingcart->delete();
        Session::flash('success', 'Item deleted successfully!');
      }
      catch(QueryException $e) {
        Session::flash('warning', 'Failed to perform the operation!');
        return redirect()->route('cart.index');
        //dd($e->getMessage());
      }
      return redirect()->route('cart.index');
    }
}
