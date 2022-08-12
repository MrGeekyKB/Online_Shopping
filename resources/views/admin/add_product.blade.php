@extends('layout')
@section('content')
<div class="form">
  <form class="" action="{{Route('products.store')}}" method="post">
    @csrf
    <label for="">Product Name</label><br>
    <input type="text" name="name" value=""><br>
    <label for="">Price in ₹</label><br>
    <input type="text" name="price" value=""><br>
    <input type="submit" name="next" value="Next" class="next">
  </form>
</div>
@endsection
