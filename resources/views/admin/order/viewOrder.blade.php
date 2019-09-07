@extends('admin.master')
	@section('title')
		view order
	@endsection
@section('mainContent')
                       <!-- order info -->
<br/>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-deafult"> 
			<div class="panel-body">
			   <h3 class="text-center text-success">Ordert info for this Order</h3>
				  <table class="table table-bordered">
				  	<tbody>
						<tr>
							<th>Order Nom</th>
							<th>{{ $order->id}}</th>
						</tr>
						<tr>
							<th>Order Total</th>
							<th>{{ $order->orderTotal}}</th>
						</tr>
						<tr>
							<th>Order Status/th>
							<th>g{{ $order->orderStatus}}</th>
						</tr>
						<tr>
							<th>Order Date</th>
							<th>{{ $order->created_at}}</th>
						</tr>
					</tbody>
				 </table>
			 </div>
		 </div>
	</div>
</div>
		
					<!-- Custer info table -->	


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-deafult"> 
			<div class="panel-body">
			   <h3 class="text-center text-success">Customer info for this Order</h3>
				  <table class="table table-bordered">
				  	<tbody>
						<tr>
							<th>Customer Name</th>
							<th>{{ $customer->firstName.' '.$customer->lastName}}</th>
						</tr>
						<tr>
							<th>Phone Number</th>
							<th>{{ $customer->phoneNumber}}</th>
						</tr>
						<tr>
							<th>Email Address</th>
							<th>g{{ $customer->email}}</th>
						</tr>
						<tr>
							<th>Address</th>
							<th>{{ $customer->address}}</th>
						</tr>
					</tbody>
				 </table>
			 </div>
		 </div>
	</div>
</div>


								 <!-- Shiping info table -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-deafult"> 
			<div class="panel-body">
			   <h3 class="text-center text-success">Shiping info for this Order</h3>
				  <table class="table table-bordered">
				  	<tbody>
						<tr>
							<th>Full Name</th>
							<th>{{ $shipping->fullName }}</th>
						</tr>
						<tr>
							<th>Phone Number</th>
							<th>{{ $shipping->phone }}</th>
						</tr>
						<tr>
							<th>Email Address</th>
							<th>{{ $shipping->email }}</th>
						</tr>
						<tr>
							<th>Address</th>
							<th>{{ $shipping->address }}</th>
						</tr>
					</tbody>
				 </table>
			 </div>
		 </div>
	</div>
</div>



<div class="row">
	<div class="col-md-12">
		<div class="panel panel-deafult"> 
			<div class="panel-body">
			   <h3 class="text-center text-success">Payment info for this Order</h3>
				  <table class="table table-bordered">
				  	<tbody>
						<tr>
							<th>Payment Type</th>
							<th>{{ $payment->paymentType }}</th>
						</tr>
						<tr>
							<th>Payment Status</th>
							<th>{{ $payment->paymentStatus }}</th>
						</tr>
					</tbody>
				 </table>
			 </div>
		 </div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-deafult"> 
			<div class="panel-body">
			   <h3 class="text-center text-success">Product info for this Order</h3>
				  <table class="table table-bordered">
				 	<thead>
				 		<tr>
				 			<th>Sl No</th>
					 		<th>Product Id</th>
					 		<th>Product Name</th>
					 		<th>Product Price</th>
					 		<th>Product Total</th>
					 		<th>Total Price</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		@php($i = 1)
				 	@foreach($orderDetails as $orderDetails)
				 		<tr>
				 			<td>{{ $i++ }}</td>
				 			<td>{{ $orderDetails->productId }}</td>
				 			<td>{{ $orderDetails->productName }}</td>
				 			<td>Tk .{{ $orderDetails->productPrice }}</td>
				 			<td>{{ $orderDetails->ProductQuantity }}</td>
				 			<td>Tk .{{ $orderDetails->productPrice*$orderDetails->ProductQuantity }}</td>

				 		</tr>
				    @endforeach
				 	</tbody>
				 </table>
			 </div>
		 </div>
	</div>
</div>

@endsection