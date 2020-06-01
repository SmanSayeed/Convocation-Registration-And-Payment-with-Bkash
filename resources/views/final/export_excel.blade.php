

<!--
 export_excel.blade.php
!-->

<!DOCTYPE html>
<html>
 <head>
  <title>Export Data to Excel in Laravel using Maatwebsite</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Export Data to Excel in Laravel using Maatwebsite</h3><br />
   <div align="center">
    <a href="{{ route('export_excel.excel') }}" class="btn btn-success">Export to Excel</a>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <tr>
      <td>Customer Name</td>
      <td>faculty</td>
      <td>dept</td>
      <td>degree</td>
      <td>payment_key</td>
       <td>Image</td>
         <td>TrxID</td>
     </tr>
     @foreach($customer_data as $customer)
     <tr>
      <td>{{ $customer->username }}</td>
      <td>{{ $customer->faculty }}</td>
      <td>{{ $customer->dept }}</td>
      <td>{{ $customer->degree }}</td>
      <td>{{ $customer->payment_key }}</td>
       <td>{{ $customer->image}}</td>
        <td>{{ $customer->id }}</td>
     </tr>
     @endforeach
    </table>
   </div>
   
  </div>
 </body>
</html>
