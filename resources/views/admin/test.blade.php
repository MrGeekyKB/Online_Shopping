@php
$data=\App\Models\MultipleImages::where('product_id', 1)->pluck('filename')->first();
@endphp
<br><br>
<br>
<?php
$images_p1=str_replace( array('[',']') , ''  , $data );
$images_p2=str_replace( array('"') , ''  , $images_p1);
$images_p3=(explode(',',$images_p2));
?>
 <?php
 $length=count($images_p3);
 for($i=1;$i<=$length;$i++){
   $newi=$i-1;
   $url="/images/$images_p3[$newi]";
   $image=url($url);
   ?>

   <img src="{{url($image)}}" alt="new image" width="" height="">
   <?php
 }
  ?>
