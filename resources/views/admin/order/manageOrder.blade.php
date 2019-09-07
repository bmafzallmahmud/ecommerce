@extends('admin.master')

@section('mainContent')

</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 		<th>id</th>
 		<th>Customer Name</th>
 		<th>Order Total</th>
 		<th>Order Date</th>
 		<th>Order Status</th>
 		<th>Payment Type</th>
 		<th>Payment Status</th>
 		<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		@php($i = 1)
 		@foreach($orders as $orders)
 		<tr>
 			<td>{{ $i++ }}</td>
 			<td>{{ $orders->firstName . " " . $orders->lastName}}</td>
 			<td>{{ $orders->orderTotal}}</td>
 			<td>{{ $orders->created_at}}</td>
 			<td>{{ $orders->orderStatus}}</td>
 			<td class="text-center">{{ $orders->paymentType}}</td>
 			<td class="text-center">{{ $orders->paymentStatus}}</td>
 			<td class="text-center">
 				
	 				<a href="{{ url('/view/order',['id'=> $orders->id]) }}" class="btn btn-info btn-sm" title="View Order Details" >
	 					<span class="glyphicon glyphicon-zoom-in"></span>
	 				</a>
 				
	 				<a href="{{ url('/view/order/invoice',['id'=> $orders->id]) }}" class="btn btn-warning btn-sm" title="View Order Invoice">
	 					<span class="glyphicon glyphicon-zoom-out"></span>
	 				</a>
	 				<a href="{{ url('/download/order/invoice',['id'=> $orders->id]) }}" class="btn btn-primary btn-sm" title="Download Order Invoice">
	 					<span class="glyphicon glyphicon-download"></span>
	 				</a>
 				
	 				<a href="" class="btn btn-success btn-sm" title="Edit Order">
	 					<span class="glyphicon glyphicon-edit"></span>
	 				</a>
 				<a href="" title="Delete Order"class="btn btn-danger btn-sm" onclick=" return confirm('are you sure to delele this')">
 					<span class="glyphicon glyphicon-trash"></span>
 				</a>

 			</td>
 			
 		</tr>
 	  @endforeach
 	</tbody>
 </table>



 @endsection