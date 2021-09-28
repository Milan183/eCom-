@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/products">Back To The Products</a>
            <h2> {{ $product['name'] }} </h2>
            <h3> Price: {{ $product['price'] }} Rs/- </h3>
            <h4> Details: {{ $product['description'] }} </h4>
            <h4> Category: {{ $product['category'] }} </h4>
            <br><br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <b> Qty :- </b> &nbsp;
                <input type="number" name="quantity" min="1" max="10" value="1" placeholder="pieces">
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <br><br>
                <button class="btn btn-primary"> Add to Cart </button>
            </form>
            <br><br>
        </div>
    </div>
</div>
@endsection