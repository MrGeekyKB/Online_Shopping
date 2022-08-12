<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Cart') }}
        </h2>
    </x-slot>

    <div class="">
      @if (count($cart_items)>0)
        @foreach ($cart_items as $item)
        <div class="product_listing">
          @php
          $data=\App\Models\MultipleImages::where('product_id', $item->product_id)->pluck('filename')->first();
          $images_p1=str_replace( array('[',']') , ''  , $data );
          $images_p2=str_replace( array('"') , ''  , $images_p1);
          $images_p3=(explode(',',$images_p2));
          $url="/images/$images_p3[0]";
          $image=url($url);
          @endphp
          <img src="{{$image}}" alt="" height="100" width="100" class="thumbnail">
          @php
          $product_data=\App\Models\Products::where('id', $item->product_id)->first();
          @endphp
          <h2>{{$product_data->name}}</h2>
          <h3>₹ {{$product_data->price}}</h3>
          <a href="{{ route('removeProduct', ['id' => $product_data['id']])}}" class="btn-admin">Remove</a>
        </div>
        @endforeach
      @else
          <h2>No posts found</h2>
      @endif
      <a href="{{Route('checkout')}}" class="btn-admin">Checkout</a>
    </div>
</x-app-layout>
