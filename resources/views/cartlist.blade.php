@extends('master')

@section('content')
<div class="custom-product">
    <div class="col-sm-12">
        <div class="trending-wrapper">
            <a class="btn btn-success" href="/ordernow"> Order Now </a><br><br>
            <h4> Results for Products </h4>
            @foreach($products as $item)
                <div class="row searched-item cartlist-divider">
                    <div class="col-sm-4">
                        <a href="/detail/{{$item->id}}">
                            <img class="trending-image" src="{{$item->gallery}}">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <div class="">
                            <h3> {{ $item->name }} </h3>
                            <h5> {{ $item->description }} </h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning"> Remove From Cart </a>
                    </div>
                </div>
            @endforeach
            <a class="btn btn-success" href="/ordernow"> Order Now </a><br><br>
        </div>
    </div>
</div>
@endsection
