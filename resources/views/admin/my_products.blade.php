@extends('layout')
@section('content')
<div class="">
  @if (count($products)>0)
    @foreach ($products as $product)
    <div class="product_listing">
      @php
      $data=\App\Models\MultipleImages::where('product_id', $product->id)->pluck('filename')->first();
      $images_p1=str_replace( array('[',']') , ''  , $data );
      $images_p2=str_replace( array('"') , ''  , $images_p1);
      $images_p3=(explode(',',$images_p2));
      $url="/images/$images_p3[0]";
      $image=url($url);
      @endphp
      <img src="{{$image}}" alt="" height="100" width="100" class="thumbnail">
      <h2>{{$product->name}}</h2>
      <h3>₹ {{$product->price}}</h3>
      <a href="{{ route('products.show', ['product' => $product['id']])}}" class="btn-admin">View</a>
      <a href="{{ route('products.edit', ['product' => $product['id']])}}" class="btn-admin">Edit</a>
    </div>
    @endforeach
  @else
      <h2>No posts found</h2>
  @endif
</div>
@endsection
