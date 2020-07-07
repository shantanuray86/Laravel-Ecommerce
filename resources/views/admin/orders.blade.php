@extends('layouts.AdminmasterLayout')
@section('title')
    All Orders
@endsection

@section('content')
<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>

  @if(session('status')) 
  <div class="alert alert-danger text-center" role="alert">
    {{session('status')}}
  </div>
  @endif           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <!-- <th>Products</th> -->

      </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
      <tr>
        <td>{{$order->order_id}}</td>
        <td>{{$order->getuserinfo->name}}</td>
        <!-- <td></td> -->
        
      </tr>
    @endforeach
      
    </tbody>
  </table>
</div>
@endsection