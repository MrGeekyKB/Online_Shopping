<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="products">
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
          <img src="{{$image}}" alt="" class="thumbnail">
          <h2 class="pname">{{$product->name}}</h2>
          <h3 class="pprice">₹ {{$product->price}}</h3>
          <a href="{{ route('displayProduct', ['id' => $product['id']])}}" class="btn-admin">View</a>
          <form class="" action="{{Route('add_to_cart')}}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="product_id" value="{{$product['id']}}">
            <input type="hidden" name="status" value="1">
            <input type="submit" name="buy" value="Add to Cart" class="btn-admin">
          </form>
        </div>
        @endforeach
      @else
          <h2>No posts found</h2>
      @endif
    </div>
</x-app-layout>
