<html lang="en">
<head>
  <title>Review</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

<h1>Review</h1>
<h4>Product Details</h4>
<form class="" action="index.html" method="post">
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

<form method="post" action="{{url('publish')}}">
  {{csrf_field()}}
  <input type="hidden" name="product_id" value="{{session('product_id')}}">
  <input type="checkbox" name="publish" value="1" required> I Agree to Publish this product. <br>
        <button type="submit" class="btn btn-primary" style="margin-top:10px">Publish</button>
  </form>

  </div>
</body>
</html>
