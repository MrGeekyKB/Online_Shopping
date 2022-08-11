<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<style media="screen">
  .sucess{
    background-color: rgb(1, 199, 84);
  }
</style>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/product_listing.css') }}">
  </head>
  <body>
    <div class="topnav">
      <a href="#"><img src="https://pngimg.com/uploads/broken_heart/broken_heart_PNG27.png" width="30" height="30" alt=""></a>
      <a href="{{url('admin/add')}}">Add Products</a>
      <a href="{{url('my_products')}}">My Products</a>

      <div class="Logout" style=" float: right ">
        <a href="">Logout</a>
      </div>
    </div>
    <div class="">
      @yield('content')
    </div>
    <div class="">
      <footer>
        <h6>Copyrights Reserved KBiotics 2022</h6>
        <h6>Made with Love and Patience</h6>
      </footer>
    </div>

  </body>
</html>
