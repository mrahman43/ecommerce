@extends('layouts.website.main')

@section('title')
Dam Koto | Cart
@endsection

@section('breadcrumb')
Dam Koto | Cart
@endsection

@section('content')
  <section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9 col-xs-12">

        <form method="POST" action="{{ route('order') }}">
          {{ csrf_field() }}
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Checkout</h2>
        </div>
            <h4 class="checkout-sep">1. Shipping Informations</h4>
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-lg-12">
                            <label for="first_name" class="required">Shipping Address</label>
                            <input type="text" class="input form-control" name="shipping_address" id="first_name" required>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">
                        <div class="col-sm-12">
                            <label for="telephone" class="required">Telephone</label>
                            <input class="input form-control" type="text" name="mobile_no" id="telephone" required>
                        </div><!--/ [col] -->

                    </li><!--/ .row -->
                </ul>
            </div>
            <h4 class="checkout-sep">2. Payment Information</h4>
            <div class="box-border" style="">
                <ul>
                    <li>
                        <label for="radio_button_5"><input type="radio" checked name="radio_4" id="radio_button_5"> Cash On Delivery</label>
                    </li>

                    {{-- <li>

                        <label for="radio_button_6"><input type="radio" name="radio_4" id="radio_button_6"> Credit card (saved)</label>
                    </li> --}}

                </ul>
            </div>
            <h4 class="checkout-sep last">3. Order Review</h4>
            <div class="box-border">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Avail.</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($shoppingcarts as $shoppingcart)
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="{{ asset('images/products/' . $shoppingcart->image) }}" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">{{ $shoppingcart->name }} </a></p>
                            </td>
                            <td class="cart_avail"><span class="label label-success">In stock</span></td>
                            <td class="price"><span>{{ $shoppingcart->price }} </span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="{{ $shoppingcart->quantity }}">
                            </td>
                            <td class="price">
                                <span>{{ $shoppingcart->price *  $shoppingcart->quantity}} </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" rowspan="2"></td>
                            <td colspan="3">Total products (tax incl.)</td>
                            <td colspan="2">{{ $total }} </td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td colspan="2"><strong>{{ $total }} </strong></td>
                        </tr>
                    </tfoot>
                </table></div>
                <a class="button" href="{{ route('cart.index')}}"><i class="fa fa-arrow-left"> </i>&nbsp; GO TO CART</a>
                <input type="hidden" name="order_id" value="{{ $orderid }}"></input>
                <button type="submit" class="button pull-right"><span>Place Order</span></button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </section>
@endsection
