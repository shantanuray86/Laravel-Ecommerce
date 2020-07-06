@extends('layouts.master')

@section('title')
    Display Cart
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<ul class="list-group">
			@foreach($products as $product)
			<li class="list-group-item">
				<span class="badge">{{ $product['qty']}}</span>
				<strong>{{ $product['item']['title']}}</strong>
				<span class="label label-success">{{ $product['price']}}</span>
				<div class="btn-group">
					<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="{{route('getReduceByOne',$product['item']['id'])}}">Reduce by 1</a></li>
						<li><a href="{{route('getRemoveItem',$product['item']['id'])}}">Reduce All</a></li>
					</ul>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<strong>Total: {{ $totalPrice}}</strong>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<a type="button" class="btn btn-success" href="{{route('checkout')}}">Checkout</a>
	</div>
</div>
@endsection