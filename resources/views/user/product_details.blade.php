<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

      @foreach ($product as $product)
      <p class="pname">{{$product['name']}}<br></p>
      <p class="pprice">₹ {{$product['price']}}</p>
      @endforeach
    @php
      $images_p1=str_replace( array('[',']') , ''  , $images);
      $images_p2=str_replace( array('"') , ''  , $images_p1);
      $images_p3=(explode(',',$images_p2));
      $length=count($images_p3);
      for($i=1;$i<=$length;$i++){
        $newi=$i-1;
        $url="/images/$images_p3[$newi]";
        $image=url($url);
    @endphp
    <img src="{{url($image)}}" alt="new image" width="700" height="500"><br>
    @php
    }
    @endphp

    <div class="btn_submit">


    <form class="" action="{{Route('add_to_cart')}}" method="post">
      @csrf
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <input type="hidden" name="product_id" value="{{$product['id']}}">
      <input type="hidden" name="status" value="1">
      <input type="submit" name="buy" value="Add to Cart" class="btn_cart">
    </form>

    </div>

</x-app-layout>
