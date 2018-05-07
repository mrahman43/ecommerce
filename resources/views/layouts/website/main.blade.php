<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlmystore.justthemevalley.com/fancy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Apr 2018 17:17:39 GMT -->
<head>
@include('partials.website._head')
</head>

<body class="cms-index-index cms-home-page">

<!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

<!-- mobile menu -->
<div id="mobile-menu">
  <div id="mobile-search">
    @include('partials.website._navbar')
</div>
<!-- end mobile menu -->
<div id="page">

  <!-- Header -->
  <header>
    <div class="header-container">
      @include('partials.website._topbar')
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-md-3 col-xs-8">
            <!-- Header Logo -->
            <div class="logo"><a title="e-commerce" href="index.html"><img alt="e-commerce" src="images/logo.png"></a> </div>
            <!-- End Header Logo -->
          </div>
          <div class="col-md-9 col-sm-8 col-xs-4">
            <div class="mtmegamenu">
              @include('partials.website._mobilemenu')
              <!-- top cart -->
              <div class="col-md-3 col-xs-9 col-sm-2 top-cart">
                <div class="top-cart-contain">
                  <div class="mini-cart">
                    @include('partials.website._shoppingcart')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->

  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        @include('partials.website._sidebar')
        <div class="col-xs-9 col-sm-6 col-md-6 hidden-xs">
          <!-- Search -->
          @include('partials.website._searchbar')
          <!-- End Search -->
        </div>
        <div class="call-us hidden-sm"> <i class="fa fa-phone"></i>
          <div class="call-us-inner"> <span class="call-text">Call us</span> <span class="call-num">Call: + 0123 456 789</span> </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav -->
  
  <!-- Home Slider Start -->
    @yield('content')

    @include('partials.website._footer')
  <!-- End Footer -->


</div>

@include('partials.website._js')

</body>

</html>
