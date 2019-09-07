@extends('fontEnd.master');
@section('title')
	Show Cart
@endsection
@section('mainContent')

<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Sl No</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Total Price</th>
						<th>Action</th>
					</tr>
					@php($i =1)
					@php( $sum = 0)
				</thead>
				
				@foreach($cartProduct as $cartProduct)
					<tr class="rem1">
						<td class="invert-closeb">
						{{$i++}}
						</td>
						<td class="invert-image"><a href="single.html"><img src="{{asset($cartProduct->options->image)}}" alt="" height="50" width="50" class="img-responsive" /></a></td>
						<td class="invert">
							 {{Form::open(['url'=>'cart/update','method'=>'post'])}}
								  <input type="number" name="qty" min="1" value="{{$cartProduct->qty}}">
								  <input type="hidden" name="rowId"  value="{{$cartProduct->rowId}}">
								  <input type="submit" name="btn" value="Update">                      
							 {{Form::close()}}
							
						</td>
						<td class="invert">{{ $cartProduct->name }}</td>
						<td class="invert">{{ $cartProduct->price }}</td>
						<td class="invert">{{ $total = $cartProduct->price*$cartProduct->qty}}</td>
						<td class="invert">
							<a class="btn btn-danger btn-sx" name="delete"  href="{{url('cart/deleteCartItem'.$cartProduct->rowId)}}">
								<samp class="glyphicon glyphicon-trash"></samp>
							</a>
						</td>
					</tr>
					<?php $sum = $sum+$total ?>
					@endforeach
			</table>
			<hr/>
			
			<table class="timetable_sub">
					<tr>
						<th>Item Total (Tk.) </th>
						<th>Total Vat (Tk.)</th>
						<th>Grand Total (Tk.)</th>
					</tr>
					<tr>
						<td>{{ $sum }}</td>
						<td>{{ $vat = 0 }}</td>
						<td>{{ $orderTotel = $sum +$vat  }}</td>
						<?php 
							Session::put('orderTotel',$orderTotel);
						?>
					</tr>
			</table>
		 
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@if(Session::get('customerId') && Session::get('shippingId'))
				     <a href="{{@url('/checkout/payment')}}" class = "btn btn-success pull-right">Checkout</a>
				@elseif(Session::get('customerId'))
				     <a href="{{@url('/checkout/shipping')}}" class = "btn btn-success pull-right">Checkout</a>
				@else
				     <a href="{{@url('/checkout')}}" class = "btn btn-success pull-right">Checkout</a>
				@endif
				<a href="{{ @url('/')}}" class = "btn btn-success">Continue Shopping</a>
			</div>
			

		</div>
	</div>
</div>	
<!-- //check out -->

@endsection