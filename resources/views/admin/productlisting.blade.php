@extends('layouts.adminMasterLayout')
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
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{$product->title}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td><img src="{{$product->imagePath}}" alt="product image" width="200" height="200"></td>
        <td><a href="{{url('admin/product/edit/'.$product->id)}}">Edit</a> | <a href="{{url('admin/product/delete/'.$product->id)}}">Delete</a></td>
      </tr>
    @endforeach
      
    </tbody>
  </table>
</div>
@endsection