<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
     Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
     
     Tip 2: you can also add an image using data-image tag
     -->
  <div class="logo"><a href="{{ url('/home' )}}" class="simple-text logo-normal">
     Dashboard Store
     </a>
  </div>
  <div class="sidebar-wrapper">
     <ul class="nav">
        <li class="nav-item active  ">
           <a class="nav-link" href="{{ url('home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
           </a>
        </li>
        <li class="nav-item ">
           <a class="nav-link" href="{{ route('products.index') }}">
              <i class="material-icons">production_quantity_limits</i>
              <p>Products</p>
           </a>
        </li>
        <li class="nav-item active-pro ">
           <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="material-icons">work_off</i>  
              <p>{{ __('Logout') }} </p>
           </a>
        </li>
     </ul>
  </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>