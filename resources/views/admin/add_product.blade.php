<div class="links">
  <nav>
    <a href="#">Add Products</a>
    <a href="#">My Products</a>
    <a href="#">Logout</a>
  </nav>
</div>

<div class="form">
  <form class="" action="{{Route('products.store')}}" method="post">
    @csrf
    <label for="">Product Name</label><br>
    <input type="text" name="name" value=""><br>
    <label for="">Price</label><br>
    <input type="text" name="price" value=""><br>
    <input type="submit" name="next" value="Next">
  </form>
</div>
