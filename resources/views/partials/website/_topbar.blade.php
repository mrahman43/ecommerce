<div class="header-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-sm-4 hidden-xs">
        <!-- Default Welcome Message -->
        <div class="welcome-msg ">Welcome to Dam Koto Online Shopping! </div>
      </div>

      <!-- top links -->
      <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
        <div class="links">
          <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span class="hidden-xs">Wishlist</span></a></div>
          <div class="blog"><a title="Blog" href="blog.html"><i class="fa fa-rss"></i><span class="hidden-xs">Blog</span></a></div>
          @guest
            <div class="login"><a href="{{ route('login')}}"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Log In</span></a></div>
          @else
            <div class="myaccount"><a title="My Account" href="account_page.html"><i class="fa fa-user"></i><span class="hidden-xs">My Account</span></a></div>
            <div class="logout" ><a href="account_page.html"  onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
             <i class="fa fa-lock"></i><span class="hidden-xs">Log Out ({{ Auth::user()->name }})</span></a></div>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
             </form>
          @endguest
          </div>
        </div>
    </div>
  </div>
</div>
