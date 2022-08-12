@extends('layout')
@section('content')
<div class="quick_bar">
  <a href="{{url('admin/add')}}"><i class="fa fa-plus-square" aria-hidden="true" style="font-size: 150px; color:rgb(1, 249, 41)"></i>Add products</a>
  <a href="{{url('my_products')}}"><i class="fa fa fa-history" aria-hidden="true" style="font-size: 150px; color:rgb(32, 0, 99)"></i>My Products</a>
</div>
@endsection
