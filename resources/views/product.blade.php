<h4>Product Details</h4>
  @foreach ($product as $product)
  <label for="">Name</label><br>
  {{$product['name']}}<br>
  <label for="">Price</label><br>
  ₹ {{$product['price']}}<br>
  @endforeach
<h2>Images</h2>
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

</form>
