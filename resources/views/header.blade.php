<?php 
  use App\Http\Controllers\ProductController;
  $total=0;
  if(Session::has('user'))
  {
    $total = ProductController::cartItem();
  }
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/products"> M-Square </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/products">Home</a></li>
      <li><a href="/myorders">orders</a></li>
      <li><a href="/cartlist">cart( {{ $total }} )</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="/search">
      <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search">
      </div>
      <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      @if(Session::has('user'))
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Session::get('user')['name'] }}</a></li>
      <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      @else
      <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Register </a></li>
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Log In </a></li>
      @endif
    </ul>
  </div>
</nav>
