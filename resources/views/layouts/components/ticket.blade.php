<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Factura # {{ $data->id }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
  </head>
  <body>

        <p class="text-info">Factura # {{ $data->id }} Guadalajara fecha de impresión {{ date('d-m-Y') }}</p>
       
        
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>             
                <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data->recipient_name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->status}}</td>
            
                    <td>{{$data->created_at}}</td>                
                </tr>
            </tbody>
        </table>
        <p>Details: {{$data->details}}</p>
        <p class="text-success text-right">SUBTOTAL: {{ number_format($data->sub_total, 2) }}</p>
        <p class="text-success text-right">IVA: {{ number_format(0, 2) }}</p>
        <h3 class="text-success text-right">TOTAL: {{ number_format($data->sub_total, 2) }}</h3>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>