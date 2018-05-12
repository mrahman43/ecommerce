@extends('layouts.website.main')

@section('title')
Dam Koto | Search
@endsection

@section('breadcrumbs')
Search
@endsection

@section('content')
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="shop-inner">
            <div class="page-title">
              <h2> Search Result </h2>
            </div>
            <div class="product-grid-area">
               <ul class="products-grid">
               @if ($data <> null)
                <li class="item col-lg-2 col-md-3 col-sm-4 col-xs-6 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumb has-hover-img">
                        {{-- <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right"><span>New</span></div> --}}
                        <figure> <a href="single_product.html"><img src="{{ asset('images/products/' . $data->image) }}" alt=""></a> <a class="hover-img" href="#"><img src="images/products/img15.jpg" alt="" max-height="500px" max-width="500px"></a></figure>
                        <div class="pr-info-area animated animate2"><a href="quick_view.html" class="quick-view"><i class="fa fa-search"><span>Quick view</span></i></a> <a href="wishlist.html" class="wishlist"><i class="fa fa-heart"><span>Wishlist</span></i></a> <a href="compare.html" class="compare"><i class="fa fa-exchange"><span>Compare</span></i></a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <h4><a title="Ipsums Dolors Untra" href="single_product.html">{{ $data->name}} </a></h4> </div>
                          <div class="item-content">
                            {{-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> --}}
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">{{ $data->price}}/- BDT</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              {{ Form::open(['route' => ['product', $data->id], 'method' => 'GET'])}}
                              <button type="submit" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                              {{ Form::close()}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </li>
                @else
                <h5>No product matches the search!</h5>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Main Container End -->
@endsection
