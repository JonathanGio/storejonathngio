@extends('layouts.app')
@section('title', 'Store Gio')
@section('meta')
    
@endsection
@section('styles')
    
@endsection
@section('content')
<div class="wrapper">
    <div id="carouselExampleIndicators" class="carousel slide">
       <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
       </ol>
       <div class="carousel-inner" role="listbox">
          <div class="carousel-item">
             <div class="page-header header-filter">
                <div class="page-header-image" style="background-image: url('https://images.unsplash.com/photo-1472851294608-062f824d29cc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');"></div>
                <div class="content-center text-center">
                   <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                         <h1 class="title">Finding the Perfect.</h1>
                         <h4 class="description text-white">The haute couture crowds make stylish statements between shows during couture season in Paris...</h4>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item active">
             <div class="page-header header-filter">
                <div class="page-header-image" style="background-image: url('https://images.unsplash.com/photo-1534452203293-494d7ddbf7e0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');"></div>
                <div class="content-center">
                   <div class="row">
                      <div class="col-md-8 ml-auto mr-auto text-center">
                         <h1 class="title">Street Style: Couture.</h1>
                         <h4 class="description text-white">See what Karlie Kloss, Tracee Ellis Ross and others wore between the shows...</h4>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="carousel-item">
             <div class="page-header header-filter">
                <div class="page-header-image" style="background-image: url('https://images.unsplash.com/photo-1557821552-17105176677c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80');"></div>
                <div class="content-center text-center">
                   <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                         <h1 class="title">For Men With Style.</h1>
                         <h4 class="description text-white">Shirts that actually fit? Check. Linen shorts? Yup. Those wider pants suddenly in style? Got them, too....</h4>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
       <i class="now-ui-icons arrows-1_minimal-left"></i>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <i class="now-ui-icons arrows-1_minimal-right"></i>
       </a>
    </div>
    <div class="main">
       <div class="section">
          <div class="container">
             <h2 class="section-title">Find what you need</h2>
             <div class="row">               
                <div class="col-md-12">
                   <div class="row">
                      @foreach ($data as $value)
                      <div class="col-lg-4 col-md-6">
                        <div class="card card-product card-plain">
                           <div class="card-image">
                              
                              <a href="#">
                              <img src="{{ url('/img/products/'.$value->avatar) }}" alt="{{ $value->title }}"/>
                              </a>
                           </div>
                           <div class="card-body">
                              <a href="#">
                                 <h4 class="card-title">{{ $value->title }}</h4>
                              </a>
                              <p class="card-description">
                                 {{ $value->subtitle }}
                              </p>
                              <p>In Stock:  {{ $value->stock_available }}</p>
                              <div class="card-footer">
                                 <div class="price-container">
                                    <span class="price">$ {{ number_format($value->price, 2, '.', '') }}</span>
                                 </div>
                                 @if ($value->stock_available > 0)
                                  <a class="nav-link btn btn-primary" data-toggle="modal" data-target="#myModal{{ $value->sku }}">
                                    Buy Now
                                  </a>  
                                 @endif                                
                              </div>
                           </div>
                        </div>
                        <!-- end card -->
                     </div> 
                     <div class="modal fade" id="myModal{{ $value->sku }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <form action="{{ route('order.pay') }}" method="post">
                              @csrf
                              <div class="modal-content">
                                 <div class="modal-header justify-content-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                       <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                    <h4 class="title title-up">Complete Purchase ID {{$value->id}}</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group">
                                       <label for="recipname">Full Name</label>
                                       <input type="hidden" name="product_id" value="{{ $value->id }}">
                                       <input type="hidden" name="total" value="{{ $value->price }}">
                                       <input type="hidden" name="details" value="{{$value->title}}({{$value->subtitle}}) X 1">
                                       <input type="text" name="recipient_name" class="form-control" id="recipname" required placeholder="Jonh Smith">                                       
                                     </div>
                                     <div class="form-group">
                                       <label for="Email">Email</label>
                                       <input type="text" name="email" class="form-control" id="Email" required placeholder="Personal Email">
                                     </div>
                                     <div class="form-group">
                                       <label for="textphone">Phone</label>
                                       <input type="text" name="phone" class="form-control" id="textphone" required placeholder="Personal Phone">
                                     </div>
                                     <p class="text-primary">Purchase Detail: {{$value->title}}({{$value->subtitle}}) X 1</p>
                                     <div class="form-check text-center">
                                       <label class="form-check-label">
                                         <input class="form-check-input" type="checkbox">
                                         <span class="form-check-sign"></span>
                                         Acept Terms and Conditions
                                       </label>
                                     </div>                                                                           
                                 </div>
                                 <div class="modal-footer text-center">                                    
                                    <button type="submit" class="btn btn-lg btn-success" style="width:100%">Pay $ {{ number_format($value->price, 2, '.', '') }} </button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!--  End Modal -->
                  
                      @endforeach                        
                   </div>
                </div>
             </div>
          </div>
       </div>           
    </div>
    <!-- end-main-raised -->
    <footer class="footer" >
       <div class=" container ">
          <nav>
             <ul>
                <li>
                   <a href="#">
                   Creative Tim
                   </a>
                </li>
                <li>
                   <a href="#">
                   About Us
                   </a>
                </li>
                <li>
                   <a href="#">
                   Blog
                   </a>
                </li>
             </ul>
          </nav>
          <div class="copyright" id="copyright">
             &copy; <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>, Designed by Jonathan Gio</a>.
          </div>
       </div>
    </footer>
 </div>
@endsection