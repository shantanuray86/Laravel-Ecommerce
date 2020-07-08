@extends('layouts.AdminmasterLayout')
@section('title')
    All Orders
@endsection

@section('content')
<div class="container">
  <h2>All Orders</h2>


  @if(session('status')) 
  <div class="alert alert-danger text-center" role="alert">
    {{session('status')}}
  </div>
  @endif           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Products</th>
        <th>User ID</th>
        <th>Total No. of Items</th>
        <th>Total Amount</th>

      </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
      <tr>
        <td>{{$order->order_id}}</td>
        <td>
          @foreach($order->getproductfromordermodelinfo as $pro)
            <p>{{$pro->getproductinfo->title}} Qty:{{$pro->product_qty}}</p>
          @endforeach
        </td>
        <td>{{$order->getuserinfo->name}}</td>
        <td>{{$order->total_product_qty}}</td>
        <td>{{$order->amount}}</td>        
      </tr>
    @endforeach
      
    </tbody>
  </table>
</div>
@endsection