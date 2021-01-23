     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg bg-white fixed-top navbar-transparent" color-on-scroll="500">
        <div class="container">
            
            
           <div class="navbar-translate">
              <a class="navbar-brand" href="{{ url('/') }}" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom">
              Store Gio
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar top-bar"></span>
              <span class="navbar-toggler-bar middle-bar"></span>
              <span class="navbar-toggler-bar bottom-bar"></span>
              </button>
           </div>
           <div class="collapse navbar-collapse" data-nav-image="img//blurred-image-1.jpg" data-color="orange">
              <ul class="navbar-nav ml-auto">
                 <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Login</p>
                    </a>
    
                </li>  
                @if (Route::has('register'))
                    <li class="nav-item">
                                      
                        <a class="nav-link" href="{{ route('register') }}"><i class="now-ui-icons users_single-02"></i>          <p>{{ __('Register') }}</p></a>
                    </li>
                @endif
            @else
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                <i class="now-ui-icons users_single-02"></i>
                <p>Panel Admin</p>
                </a>

            </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest                               
              </ul>
           </div>
        </div>
     </nav>
     <!-- End Navbar -->