<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoppingcart;
use App\Order;

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
          return view('website.cart');
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
        $this->validate($request, array(
          'product_id' => 'required',
          'quantity' => 'required',
        ));
        $order = Order::where([['user_id',Auth::user()->id],['status',1]]); //1 for unplaced order
        $order_id = $order->pluck('id');
        if(!empty($order_id))
        {
            $shoppingcart = new Shoppingcart;
            $shoppingcart->product_id = $request->product_id;
            $shoppingcart->product_quantity = $request->quantity;
            $product_prices = Product::find($request->product_id);
            $shoppingcart->product_price = $product_prices->pluck('price');
            $special_product_prices = Offer::where('product_id',$request->product_id);
            $special_product_price = $special_product_prices->pluck('reduction');
            $shoppingcart->product_price = $product_price - $special_product_price;
            $shoppingcart->order_id = $order_id;
            $shoppingcart->save();
        } else {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->status = 1;
            $shoppingcart = new Shoppingcart;
            $shoppingcart->product_id = $request->product_id;
            $shoppingcart->product_quantity = $request->quantity;
            $product_prices = Product::find($request->product_id);
            $shoppingcart->product_price = $product_prices->pluck('price');
            $special_product_prices = Offer::where('product_id',$request->product_id);
            $special_product_price = $special_product_prices->pluck('reduction');
            $shoppingcart->product_price = $product_price - $special_product_price;
            $shoppingcart->order_id = $order->id;
            $shoppingcart->save();
        }
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
