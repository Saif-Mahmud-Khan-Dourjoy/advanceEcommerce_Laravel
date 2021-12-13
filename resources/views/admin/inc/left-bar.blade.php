<div class="sl-sideleft">
      
      <div class="sl-sideleft-menu">
      	  <a href="{{url('/')}}" class="sl-menu-link" target="_blank">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
          </div><!-- menu-item -->
        </a>
        <a href="{{route('admin.dashboard')}}" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Charts</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
          <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
          <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
          <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
          <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
        </ul>
            <a href="{{route('brand')}}" class="sl-menu-link @yield('brand')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Brand</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link @yield('category')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('category')}}" class="nav-link  @yield('add-category')">Add Category</a></li>
          <li class="nav-item"><a href="{{route('sub.category')}}" class="nav-link @yield('sub-category')">Sub Category</a></li>
          <li class="nav-item"><a href="{{route('sub.sub.category')}}" class="nav-link @yield('sub-sub-category')">Sub->Sub Category</a></li>
         
        </ul>

        <a href="#" class="sl-menu-link @yield('product')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Product</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('form.product')}}" class="nav-link  @yield('add-product')">Add Product</a></li>
          <li class="nav-item"><a href="{{route('manage.product')}}" class="nav-link @yield('manage-product')">Manage Product</a></li>
          
         
        </ul>
        <a href="{{route('slider')}}" class="sl-menu-link @yield('slider')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Slider</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a>

       
      </div><!-- sl-sideleft-menu -->

      <br>
    </div>