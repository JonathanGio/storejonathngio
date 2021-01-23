@extends('layouts.app')

@section('content')
<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url({{ asset('img/login.jpg') }})"></div>
    <div class="content">
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto">
                <div class="card card-login card-plain">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="card-header text-center">
                      <div class="logo-container">
                        <img src="{{ asset('img/now-logo.png') }}" alt="">
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons users_circle-08"></i>
                          </span>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons text_caps-small"></i>
                          </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Personal">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons text_caps-small"></i>
                          </span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="input-group no-border input-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="now-ui-icons text_caps-small"></i>
                          </span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                      </div>

                    </div>
   
                    <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Register</button>
                      <div class="pull-left">
                        <h6>
                          <a href="{{ route('register') }}" class="link">Create Account</a>
                        </h6>
                      </div>
                      <div class="pull-right">
                        <h6>
                          <a href="{{ route('password.request') }}" class="link">Forgot Password</a>
                        </h6>
                      </div>
                  </form>
                  </div>
                </div>

           
        </div>
    </div>
    <footer class="footer">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="https://www.creative-tim.com">
                Creative Tim
              </a>
            </li>
            <li>
              <a href="http://presentation.creative-tim.com">
                About Us
              </a>
            </li>
            <li>
              <a href="http://blog.creative-tim.com">
                Blog
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Designed by
          <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
      </div>
    </footer>
  </div>

@endsection
