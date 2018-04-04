@extends('layouts.master')

@section('content')
<div class="container">

	<div class="row">
		<h1>
			<i class="fas fa-shopping-cart"></i> Your cart(
			{{$cartCount}} 
			@if($cartCount==1)
			Product
			@else
			Products
			@endif
			)
		</h1>
	</div>
	<hr>
	<div class="row">
	<div class="table-responsive">
		<table class="table table-hover">
  			<thead class="table-info">
			    <tr>
			      <th scope="col"></th>
			      <th scope="col">Product</th>
			      <th scope="col">Price</th>
			      <th scope="col"></th>
			    </tr>
  			</thead>
  			@foreach($cartItems as $item)
			<tbody>
			    <tr>
			      <th class="align-middle">
			      	<img src="{{$item->image}}" style="width: 50px;height: 50px">
			      </th>
			      <td class="align-middle">{{$item->name}}</td>
			      <td class="align-middle">{{$item->price}} $</td>
			      <td class="align-middle">

			      	<form method="POST" action="/remove/{{$item->id}}">
            		{{ csrf_field() }}
           			<input type="hidden" name="_method" value="DELETE">
           			<button class="btn btn-primary" type="submit">
           				<i class="fas fa-trash-alt"></i>
           			</button>
        			</form>

			      	
				</td>
			    </tr>
			  </tbody>
			  @endforeach
		</table>
	</div>
	</div>

	<div class="row">
		<h2>Cart summary</h2>
		<h5 class="d-flex align-items-center">({{$cartCount}} 
			@if($cartCount>1)
			Products
			@else
			Product
			@endif)
		</h5>
	</div>
	@php
    	$price = 0;
    @endphp
    @foreach($cartItems as $items)
    	@php
    		$price=$items->price+$price;
    	@endphp
    @endforeach
	<div class="row">
		<h3>Total: {{$price}} $</h3>
	</div>
	<br>
	<div class="row">
		<div class="col-md-3">
			<a href="/" class="btn btn-light btn-block" role="button" aria-pressed="true">
				Continue shopping
			</a>
		</div>
		<div class="col-md-3">
		@if($cartCount>=1)
			<a href="/checkout" class="btn btn-primary btn-block" role="button" aria-pressed="true">
			Proceed to checkout
			</a>
		@else
			<span tabindex="0" data-toggle="tooltip" title="No items in cart">
  				<button class="btn btn-primary btn-block" style="pointer-events: none;" type="button" disabled>Proceed to checkout
  				</button>
			</span>
		@endif
		
		</div>
	</div>
</div>

@endsection