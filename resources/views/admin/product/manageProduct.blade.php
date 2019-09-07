@extends('admin.master')
	@section('title')
		manage product
	@endsection
@section('mainContent')

</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 		<th>Product Name</th>
 		<th>Category Name</th>
 		<th>Manufacturer name</th>
 		<th>Product Price</th>
 		<th>Product Quantity</th>
 		<th>Publication Status</th>
 		<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
 		@foreach($products as $products_data)
 		<tr>
 			<td>{{$products_data->productName}}</td>
 			<td>{{$products_data->categoryName}}</td>
 			<td>{{$products_data->manufacturerName}}</td>
 			<td>{{$products_data->productPrice}}</td>
 			<td>{{$products_data->productQuantity}}</td>
 			<td>{{$products_data->publicationStatus == 1 ? 'Publish':'Unpublish'}}</td>
 			<td>


 				<a href="{{url('/product/view/'.$products_data->id)}}" title="view" class="btn btn-success">
 					<span class="glyphicon glyphicon-info-sign"></span>
 				</a>
 				<a href="{{url('/product/edit/'.$products_data->id)}}" title="edit" class="btn btn-success">
 					<span class="glyphicon glyphicon-edit"></span>
 				</a>
 				<a href="{{url('/product/delete/'.$products_data->id)}}" class="btn btn-danger" title="delele" onclick=" return confirm('are you sure to delele this')">
 					<span class="glyphicon glyphicon-trash"></span>
 				</a>
 				

 			</td>
 			
 		</tr>
 	  @endforeach
 	</tbody>
 </table>



 @endsection