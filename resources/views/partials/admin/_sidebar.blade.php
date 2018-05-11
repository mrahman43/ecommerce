<!-- Main sidebar -->
<div class="sidebar sidebar-main">
  <div class="sidebar-content">

    <!-- User menu -->
    {{-- <div class="sidebar-user">
      <div class="category-content">
        <div class="media">
          <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
          <div class="media-body">
            <span class="media-heading text-semibold">Mousumi Rahman</span>
            <div class="text-size-mini text-muted">
              <i class="icon-pin text-size-small"></i> &nbsp;Laravel Developer
            </div>
          </div>

          <div class="media-right media-middle">
            <ul class="icons-list">
              <li>
                <a href="#"><i class="icon-cog3"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

          <!-- Main -->
          <li class="navigation-header"><span>Dashboard</span> <i class="icon-menu" title="Main pages"></i></li>
          <li ><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
          <li ><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Sales Report</span></a></li>
          <li class="navigation-header"><span>Product Control</span> <i class="icon-menu" title="Main pages"></i></li>
          <li class="">
            <a href="{{ route('categories.index') }}"><i class="icon-pencil"></i> <span>Category</span></a>
          </li>
          <li class="">
            <a href="{{ route('subcategories.index') }}"><i class="icon-stack2"></i> <span>Subcategory</span></a>
          </li>
          <li class="">
            <a href="{{ route('brands.index') }}"><i class="icon-stack2"></i> <span>Brands</span></a>
          </li>
          <li class="">
            <a href="{{ route('products.index') }}"><i class="icon-office"></i> <span>Product</span></a>
          </li>
          <li class="navigation-header"><span>Website Customizations</span> <i class="icon-menu" title="Main pages"></i></li>
          <li ><a href="{{ route('admin.website.homepage') }}"><i class="icon-home4"></i> <span>Homepage</span></a></li>
          <li class="navigation-header"><span>Accounts</span> <i class="icon-menu" title="Main pages"></i></li>
          <li ><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Users</span></a></li>
          <li ><a href="{{ route('admin.dashboard') }}"><i class="icon-home4"></i> <span>Employees</span></a></li>
        </ul>
      </div>
    </div>
    <!-- /main navigation -->

  </div>
</div>
<!-- /main sidebar -->
