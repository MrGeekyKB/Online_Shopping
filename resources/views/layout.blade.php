<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<script src="https://kit.fontawesome.com/cc9c7e92c2.js" crossorigin="anonymous"></script>
<style media="screen">
  .sucess{
    background-color: rgb(1, 199, 84);
  }
</style>
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/product_listing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/fafa_icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/admin.css') }}">
  </head>
  <body>
    <div class="topnav">
      <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
      <a href="{{url('admin/add')}}">Add Products</a>
      <a href="{{url('my_products')}}">My Products</a>

      <div class="Logout" style=" float: right ">
        <a href="{{url('/')}}">Logout</a>
      </div>
    </div>
    <div class="">
      @yield('content')
    </div>
    <div class="">
      <footer>
<h3>Admin Rights</h3>
      </footer>
    </div>

  </body>
</html>
