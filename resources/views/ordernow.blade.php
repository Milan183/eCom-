@extends('master')

@section('content')
<div class="custom-product">
    <div class="col-sm-12">
        <table class="table table-dark" style="background-color: aqua;">
            <thead>
                <tr style="background-color: orange;">
                    <th scope="col">#</th>
                    <th scope="col"> Service Charges </th>
                    <th scope="col"> Payable Amount </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td> Amount </td>
                    <td> {{ $total }} RS/- </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td> Service Tax </td>
                    <td> 0 RS/- </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td> Delivery </td>
                    <td> 10 Rs/- </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td> Total Amount </td>
                    <td> {{ $total + 10 }} Rs/- </td>
                </tr>
            </tbody>
        </table>
    </div>
    <form action="/orderplace" method="POST" style="padding:10px; margin:10px;">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Residencial Address </label>
            <textarea name="address" placeholder="Enter Your Permanent Address" class="form-control" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"> Payment Method </label><br><br>
            <input type="radio" value="Online" name="payment"> <span> Online Payment </span><br><br>
            <input type="radio" value="EMI" name="payment"> <span> EMI Payment </span><br><br>
            <input type="radio" value="COD" name="payment"> <span> Cash ON Delivery </span><br><br>
            <input type="radio" value="cash" name="payment"> <span> Cash ON Hand </span><br><br>
        </div>
            <button type="submit" class="btn btn-success"> Order Now </button>
    </form>
</div>
@endsection