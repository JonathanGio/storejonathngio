@extends('layouts.app')
@section('title', 'Store Gio')
@section('meta')
    
@endsection
@section('styles')
    
@endsection
@section('content')
<div class="wrapper">
    <div class="page-header page-header-small">
      <div class="page-header-image" data-parallax="true" style="background-image: url('https://images.unsplash.com/photo-1556740772-1a741367b93e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80');">
      </div>
      <div class="content-center">
        <div class="container">
          <img src="https://img.icons8.com/fluent/100/000000/good-pincode.png"/>
          <h1 class="title">ORDEN #{{ $order->id }} PAY</h1>
          <div class="text-center">            
            <a href="{{ route('print.now', $order->id) }}" class="btn btn-primary btn-round btn-block btn-lg" target="_blank">Descargar Factura</a>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title">Detalle</h2>
            <h5 class="description">{{ $order->details }}</h5>
          </div>
        </div>
        <div class="separator separator-primary"></div>
        <div class="section-story-overview">
          <div class="row">
            <div class="col-md-6">
              <div class="image-container image-left" style="background-image: url({{ url('/img/products/'.$product->avatar) }})">
                <!-- First image on the left side -->
                <p class="blockquote blockquote-primary">"Over the span of the satellite record, Arctic sea ice has been declining significantly, while sea ice in the Antarctichas increased very slightly"
                  <br>
                  <br>
                  <small>-NOAA</small>
                </p>
              </div>
              <!-- Second image on the left side of the article -->
              <div class="image-container" style="background-image: url({{ url('/img/products/'.$product->avatar) }})"></div>
            </div>
            <div class="col-md-5">
              <!-- First image on the right side, above the article -->
              <div class="image-container image-right" style="background-image: url({{ url('/img/products/'.$product->avatar) }})"></div>
              <h3>{{ $product->subtitle }}</h3>
              <p>{{ $product->details }}</p>
              <p>
                {{ $product->more_info }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <footer class="footer footer-default">
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