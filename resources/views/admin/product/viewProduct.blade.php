@extends('admin.master')
	@section('title')
		manage product
	@endsection
@section('mainContent')
<!-- // proveider App Service -->
{{$name}}  


</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
  	<tbody>
  		<tr>
		<th>Product id</th>
		<th>{{$productById->id}}</th>
	</tr>
	<tr>
		<th>Product Name</th>
		<th>{{$productById->productName}}</th>
	</tr>
	<tr>
		<th>Category Name</th>
		<th>{{$productById->categoryName}}</th>
	</tr>
	<tr>
		<th>Manufacturer Name</th>
		<th>{{$productById->manufacturerName}}</th>
	</tr>
	<tr>
		<th>Product Price</th>
		<th>{{$productById->productPrice}}</th>
	</tr>
	<tr>
		<th>Product Quantity</th>
		<th>{{$productById->productQuantity}}</th>
	</tr>
	<tr>
		<th>Product Short Description</th>
		<th>{{$productById->productShortDescription}}</th>
	</tr>
	<tr>
		<th>Product Long Description</th>
		<th>{{$productById->productLongDescription}}</th>
	</tr>
	<tr>
		<th>Product Image</th>
		<th>
		  <image src = "{{asset($productById->productImage)}}" alt ="{{asset($productById->productName)}}" width=200px height= 200px>
		</th>
	</tr>
	<tr>
		<th>Publication Status</th>
		<th>{{$productById->publicationStatus == 1 ? 'Publish':'Unpublish'}}</th>
	</tr>

	</tbody>

 </table>



 @endsection