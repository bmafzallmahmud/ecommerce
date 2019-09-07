@extends('admin.master')
@section('title')
view order
@endsection
@section('mainContent')

<br/>

<div class="row">
	<div class="col-xs-6">
		<h1>
			<a href="https://tahirtaous.com/">
				<!--   <img src="logo.png"> -->
				Tahir Taous
			</a>
		</h1>
	</div>
	<div class="col-xs-6 text-right">
		<h1>INVOICE</h1>
		<h1><small>Invoice #005</small></h1>
	</div>
</div>

<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Shipping Info</h4>
			</div>
			<div class="panel-body">
				<p class="text-left">{{ $shipping->fullName }}</p>
				<p class="text-left">{{ $shipping->address }}</p>
				<p class="text-left">{{ $shipping->phone }}</p>
			</div>
		</div>
	</div>
	<div class="col-xs-5 col-xs-offset-2 text-right">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Billing Info</h4>
			</div>
			<div class="panel-body">
				<p class="text-left">{{ $customer->firstName.' '.$customer->lastName }}</p>
				<p class="text-left">{{ $customer->address }}</p>
				<p class="text-left">{{ $customer->phone }}</p>
			</div>
		</div>
	</div>
</div> <!-- / end client details section -->

<div class="row">
	<div class="col-xs-5">
		<h4>Eshop Online Shopping</h4>
		<h3>C/O B M Afzall Mahmud</h3>
	</div>
	<div class="col-xs-5 col-xs-offset-2 text-right">
		
		<table class="table table-responsive table-bordered">

			<tbody>
				<tr>
					<th>
						Invoice#
						<td><span>0000</span>{{ $order->id }}</td>
					</th>
				</tr>		
				<tr>
					<th>Date
						<td>{{ $order->created_at }}</td>
					</th>
				</tr>
				<tr>
					<th>Amount Due
						<td>{{ $order->orderTotal }}</td>
					</th>
				</tr>


			</tbody>
		</table>

	</div>
</div>


<table class="table table-bordered">
	<thead>
		<tr>
			<th><h4>Service</h4></th>
			<th><h4>Description</h4></th>
			<th><h4>Hrs/Qty</h4></th>
			<th><h4>Rate/Price</h4></th>
			<th><h4>Sub Total</h4></th>
		</tr>
	</thead>
	<tbody>
		@php($sum = 0)
		@foreach ($orderDetails as $orderDetail)
			<tr>
				<td>{{  $orderDetail->productName }}</td>
				<td>{{  $orderDetail->productShortDescription}}</td>
				<td>{{  $orderDetail->ProductQuantity }}</td>
				<td><span>Tk : </span>{{  $orderDetail->productPrice }}</td>
				<td><span>Tk : </span>{{ $total = $orderDetail->ProductQuantity*$orderDetail->productPrice }}</td>
			</tr>
		@php($sum = $sum+$total)
		@endforeach
	</tbody>
</table>

<div class="row text-right">
	<div class="col-xs-2 col-xs-offset-8">
	<table class="table table-bordered">
		<tbody>
				<tr>
					<th>Total
						<td><span>TK: </span>{{ $sum }}</td>
					</th>
				</tr>
		</tbody>
	</table>
	</div>

</div>


<div class="row">
	<div class="col-xs-5">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Paypal details</h4>
			</div>
			<div class="panel-body">
				<p>tahirtaous@live.com</p>
			   <!--  <p>Bank Name</p>
			    <p>SWIFT : --------</p>
			    <p>Account Number : --------</p>
			    <p>IBAN : --------</p> -->
			</div>
		</div>
	</div>
	<div class="col-xs-7">
		<div class="span7">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Contact Details</h4>
				</div>
				<div class="panel-body">
					<p>
						Email : contact@tahirtaous.com <br><br>
						Mobile : +923456017839 <br> <br>
						Twitter  : <a href="https://twitter.com/tahirtaous">@TahirTaous</a>
					</p>
					<!--  <h4>Payment should be mabe by Bank Transfer</h4> -->
				</div>
			</div>
		</div>
	</div>
</div>


















@endsection