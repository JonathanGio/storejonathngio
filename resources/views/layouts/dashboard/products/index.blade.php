@extends('layouts.dashboard')
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-10 offset-md-3">
            <div class="row text-center">
               @if(session('status'))
               <div class="col-sm-6 col-md-6 col-offset-md-3">
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Bien hecho!</strong> {{ session('status') }}
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               </div>
               @endif
            </div>
         </div>
         <div class="col-md-12">
            <div class="card">
               <div class="card-header card-header">
                  <h2 class="card-title ">List of Products</h2>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Add Product</button>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table id="example" class="display" style="width:100%">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Stock</th>
                              <th>SKU</th>
                              <th>Created</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($data as $value)
                           <tr>
                              <td>{{ $value->title }}</td>
                              <td>{{ number_format($value->price, 2, '.', '') }}</td>
                              <td>{{ $value->stock_available }}</td>
                              <td>{{ $value->sku }}</td>
                              <td>{{ $value->created_at }}</td>
                              <td>
                                 {{--Editar producto--}}
                                 <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-toggle="modal" data-target="#ModalEditProduct{{ $value->id }}" data-original-title="Edit Product">
                                    <i class="material-icons">edit</i>
                                  <div class="ripple-container"></div>
                                </button>    
                                						   
                                <form action="{{ route('products.destroy', $value->id) }}" method="post" style="display: initial;">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-link btn-sm delete-product" title="Eliminar"><i class="material-icons">close</i></button>
                                </form>									                                                          
                              </td>
                           </tr>
                           @include('layouts.dashboard.forms.edit')                           
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Stock</th>
                              <th>SKU</th>
                              <th>Created</th>
                              <th>Actions</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
               @include('layouts.dashboard.forms.add')
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer')
<footer class="footer">
   <div class="container-fluid">
      <nav class="float-left">
         <ul>
            <li>
               <a href="{{ url('/home') }}">
               Licenses
               </a>
            </li>
         </ul>
      </nav>
      <div class="copyright float-right">
         &copy;
         <script>
            document.write(new Date().getFullYear())
         </script>, made with <i class="material-icons">favorite</i> by
         <a href="#" target="_blank">Jonathan Gio</a> for a better web.
      </div>
   </div>
</footer>
@endsection
@section('js')
<script>
   $(document).ready(function() {
       $('#example').DataTable( {
           "order": [[ 3, "desc" ]]
       });

       $('.delete-product').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
   } );
</script>
@endsection