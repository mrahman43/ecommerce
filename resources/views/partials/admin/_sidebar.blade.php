<!-- Main sidebar -->
<div class="sidebar sidebar-main">
  <div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user">
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
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

          <!-- Main -->
          <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
          <li ><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
          <li class="active">
            <a href="{{ route('categories.index') }}"><i class="icon-stack2"></i> <span>Category</span></a>
          </li>
          <li>
            <a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
            <ul>
              <li><a href="index.html" id="layout1">Layout 1 <span class="label bg-warning-400">Current</span></a></li>
              <li><a href="../../layout_2/LTR/index.html" id="layout2">Layout 2</a></li>
              <li><a href="../../layout_3/LTR/index.html" id="layout3">Layout 3</a></li>
              <li><a href="../../layout_4/LTR/index.html" id="layout4">Layout 4</a></li>
              <li class="disabled"><a href="../../layout_5/LTR/index.html" id="layout5">Layout 5 <span class="label">Coming soon</span></a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
            <ul>
              <li><a href="colors_primary.html">Primary palette</a></li>
              <li><a href="colors_danger.html">Danger palette</a></li>
              <li><a href="colors_success.html">Success palette</a></li>
              <li><a href="colors_warning.html">Warning palette</a></li>
              <li><a href="colors_info.html">Info palette</a></li>
              <li class="navigation-divider"></li>
              <li><a href="colors_pink.html">Pink palette</a></li>
              <li><a href="colors_violet.html">Violet palette</a></li>
              <li><a href="colors_purple.html">Purple palette</a></li>
              <li><a href="colors_indigo.html">Indigo palette</a></li>
              <li><a href="colors_blue.html">Blue palette</a></li>
              <li><a href="colors_teal.html">Teal palette</a></li>
              <li><a href="colors_green.html">Green palette</a></li>
              <li><a href="colors_orange.html">Orange palette</a></li>
              <li><a href="colors_brown.html">Brown palette</a></li>
              <li><a href="colors_grey.html">Grey palette</a></li>
              <li><a href="colors_slate.html">Slate palette</a></li>
            </ul>
          </li>


        </ul>
      </div>
    </div>
    <!-- /main navigation -->

  </div>
</div>
<!-- /main sidebar -->
