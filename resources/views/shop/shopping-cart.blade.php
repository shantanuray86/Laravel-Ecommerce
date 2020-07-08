@extends('layouts.master')

@section('title')
    Display Cart
@endsection

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<ul class="list-group">
		@if(Session::has('cart'))    	
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
		@else
		<p>Your Cart is empty</p>
		@endif
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<strong>Total: {{Session::has('cart')? $totalPrice : "" }}</strong>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		@if(Session::has('cart') && Auth::id())
		<a type="button" class="btn btn-success" href="{{route('checkout')}}">Checkout</a>
		@elseif(Session::has('cart') && !Auth::id())
		<a type="button" class="btn btn-primary" href="{{route('login')}}">Please Login First</a>
		@else
		<a type="button" class="btn btn-primary" href="{{route('home')}}">Select a product first</a>
		@endif		
	</div>
</div>
@endsection