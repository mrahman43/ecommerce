@extends('layouts.website.main')

@section('title')
Dam Koto | Product
@endsection

@section('breadcrumb')
Product
@endsection


@section('content')
  <!-- Main Container -->
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main">
          <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
              <div class="large-image"> <a href="" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20">
                <img class="zoom-img" src="{{ asset('images/products/' . $product->image) }}" alt="products"> </a> </div>
              {{-- <div class="flexslider flexslider-thumb">
                <ul class="previews-list slides">
                  <li><a href='images/products/img01.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img01.jpg' "><img src="images/products/img01.jpg" alt = "Thumbnail 2"/></a></li>
                  <li><a href='images/products/img07.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img07.jpg' "><img src="images/products/img07.jpg" alt = "Thumbnail 1"/></a></li>
                  <li><a href='images/products/img02.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img02.jpg' "><img src="images/products/img02.jpg" alt = "Thumbnail 1"/></a></li>
                  <li><a href='images/products/img03.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img03.jpg' "><img src="images/products/img03.jpg" alt = "Thumbnail 2"/></a></li>
                  <li><a href='images/products/img04.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img04.jpg' "><img src="images/products/img04.jpg" alt = "Thumbnail 2"/></a></li>
                </ul>
              </div> --}}

              <!-- end: more-images -->

            </div>
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1>{{ $product->name }}</h1>
              </div>
              <div class="price-box">
                {{-- <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $329.99 </span> </p> --}}
                <p class="special-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{ $product->price - $product->offer->reduction }}/- BDT </span> </p>
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                @if($product->stock > 0 )
                <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
                @else
                <p class="availability out-of-stock pull-right">Availability: <span>Out of Stock</span></p>
                @endif
              </div>
              <div class="short-description">
                <h4>Quick Overview</h4>
                <p>{{ $product->description }}</p>
              </div>
              <div class="product-variation">
                {{ Form::open(array('route' => 'cart.store', 'files' => true, 'action' => '#')) }}
                {{-- <form action="{{ route('cart.store') }}" method="post"> --}}
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="quantity">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <button class="button pro-add-to-cart" title="Add to Cart" type="submit"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                {{ Form::close() }}
              </div>
              <div class="product-cart-option">
                <ul>
                  <li><a href="{{ route('wishlist.add',$product->id)}}"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                  <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="product-overview-tab">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="product-tab-inner">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                    <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                    {{-- <li><a href="#product_tags" data-toggle="tab">Tags</a></li>
                    <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li> --}}
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active">
                      <div class="std">
                      @foreach ($attributesets as $attributeset)
                        <div class="col-sm-2 col-lg-2 col-md-2">
                          <p><strong>{{ $attributeset->id }}: </strong> {{ $attributeset->value}}<p>
                          </div>
                      @endforeach
                      </div>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="col-sm-5 col-lg-5 col-md-5">
                        <div class="reviews-content-left">
                          <h2>Customer Reviews</h2>
                          @foreach ($reviews as $review)
                            <div class="review-ratting">
                              <p>{{ $review->description }}</p>
                              <table>
                                <tbody>
                                  <tr>
                                    <td>
                                      <div class="rating">
                                        <?php
                                        for($j=1; $j<=5 ; $j++) {
                                          if($j <= $review->rating ) {
                                            echo "<i class='fa fa-star'></i>";
                                          } else {
                                            echo "<i class='fa fa-star-o'></i>";
                                          }
                                        } ?>
                                      </div>
                                    </td>
                                  </tr>
                                  </tbody>
                              </table>
                              <p class="author"> {{ $review->user->name }}<small> (Posted on {{ $review->created_at }})</small> </p>
                            </div>

                          @endforeach

                        </div>
                      </div>
                      @guest
                      @else
                      <div class="col-sm-7 col-lg-7 col-md-7">
                        <div class="reviews-content-right">
                          <h2>Write Your Own Review</h2>
                          <form action="{{ route('review.add')}}" method="GET">
                            <h3>You're reviewing: <span>{{ $product->name}}</span></h3>
                            <h4>How do you rate this product?<em>*</em></h4>
                            <div class="table-responsive reviews-table">
                              <table>
                                <tbody>
                                  <tr>
                                    <th>1 star</th>
                                    <th>2 stars</th>
                                    <th>3 stars</th>
                                    <th>4 stars</th>
                                    <th>5 stars</th>
                                  </tr>
                                  <tr>
                                    <td><input type="radio" name="rating" value="1"></td>
                                    <td><input type="radio" name="rating" value="2"></td>
                                    <td><input type="radio" name="rating" value="3"></td>
                                    <td><input type="radio" name="rating" value="4"></td>
                                    <td><input type="radio" name="rating" value="5"></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="form-area">
                              <div class="form-element">
                                <label>Review <em>*</em></label>
                                <textarea name='description'></textarea>
                                <input type="hidden" name="product_id" value="1">
                              </div>
                              <div class="buttons-set">
                                <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      @endguest
                    </div>
                    {{-- <div class="tab-pane fade" id="product_tags">
                      <div class="box-collateral box-tags">
                        <div class="tags">
                          <form id="addTagForm" action="#" method="get">
                            <div class="form-add-tags">
                              <div class="input-box">
                                <label for="productTagName">Add Your Tags:</label>
                                <input class="input-text" name="productTagName" id="productTagName" type="text">
                                <button type="button" title="Add Tags" class="button add-tags"><i class="fa fa-plus"></i> &nbsp;<span>Add Tags</span> </button>
                              </div>
                              <!--input-box-->
                            </div>
                          </form>
                        </div>
                        <!--tags-->
                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom_tabs">
                      <div class="product-tabs-content-inner clearfix">
                        <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                          simply dummy text of the printing and typesetting industry. Lorem Ipsum
                          has been the industry's standard dummy text ever since the 1500s, when
                          an unknown printer took a galley of type and scrambled it to make a type
                          specimen book. It has survived not only five centuries, but also the
                          leap into electronic typesetting, remaining essentially unchanged. It
                          was popularised in the 1960s with the release of Letraset sheets
                          containing Lorem Ipsum passages, and more recently with desktop
                          publishing software like Aldus PageMaker including versions of Lorem
                          Ipsum.</span></p>
                      </div>
                    </div> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Container End -->
  <!-- Related Product Slider -->

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="related-product-area">
        <div class="page-header">
          <h2>Related Products</h2>
        </div>
        <div class="related-products-pro">
          <div class="slider-items-products">
            <div id="related-product-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4">
                @foreach ($products as $data)
                  @if($data->subcategory_id == $product->subcategory_id && $data->id <> $product->id)
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumb has-hover-img">
                        <figure> <a title="Ipsums Dolors Untra" href="single_product.html"> <img class="first-img" src="images/products/img15.jpg" alt=""> </a></figure>
                        <div class="pr-info-area animated animate2"><a href="quick_view.html" class="quick-view"><i class="fa fa-search"><span>Quick view</span></i></a> <a href="wishlist.html" class="wishlist"><i class="fa fa-heart"><span>Wishlist</span></i></a> <a href="compare.html" class="compare"><i class="fa fa-exchange"><span>Compare</span></i></a> </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <h4><a title="Ipsums Dolors Untra" href="{{ route('product', $product->id)}}">{{ $data->name }} </a></h4> </div>
                          <div class="item-content">
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> {{ $data->price }} </span> </p>
                              </div>
                            </div>
                            <div class="pro-action">
                              {{ Form::open(['route' => ['product', $product->id], 'method' => 'GET'])}}
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                              {{ Form::close()}}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Related Product Slider End -->

@endsection
