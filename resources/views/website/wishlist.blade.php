@extends('layouts.website.main')

@section('title')
Dam Koto | Search
@endsection

@section('content')
  <section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>My Wishlist</h2>
            </div>
            <div class="wishlist-item table-responsive">
              <table class="col-md-12">
                <thead>
                  <tr>
                    <th class="th-delate">Remove</th>
                    <th class="th-product">Images</th>
                    <th class="th-details">Product Name</th>
                    <th class="th-price">Unit Price</th>
                    <th class="th-total th-add-to-cart">Add to Cart </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($wishlists as $wishlist)
                    <tr>
                      <td class="th-delate"><a href="#">X</a></td>
                      <td class="th-product"><a href="#"><img src="{{ asset('images/products/' . $wishlist->product->image) }}" alt="cart"></a></td>
                      <td class="th-details"><h2><a href="#">{{ $wishlist->product->name}}</a></h2></td>
                      <td class="th-price">{{ $wishlist->product->price - $wishlist->product->offer->reduction }}</td>
                      <th class="td-add-to-cart"><a href="{{ route('product', $wishlist->product_id)}}"> Add to Cart</a></th>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
