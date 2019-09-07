@extends('admin.master')

@section('mainContent')

</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 		<th>id</th>
 		<th>Category Name</th>
 		<th>Category Description</th>
 		<th>Publishus</th>
 		<th>Status</th>
 		</tr>
 	</thead>
 	<tbody>
 		@foreach($category as $category_data)
 		<tr>
 			<td>{{$category_data->id}}</td>
 			<td>{{$category_data->categoryName}}</td>
 			<td>{{$category_data->categoryDescription}}</td>
 			<td class="text-center">{{$category_data->publicationStatus ==1 ? 'Published' : 'Unpublished'}}</td>
 			<td class="text-center">
 				@if($category_data->publicationStatus == 1)
	 				<a href="{{url('/category/UnpublishedCategory/'.$category_data->id)}}" class="btn btn-primary">
	 					<span class="glyphicon glyphicon-arrow-up"></span>
	 				</a>
 				@else
	 				<a href="{{url('/category/publishedCategory/'.$category_data->id)}}" class="btn btn-warning">
	 					<span class="glyphicon glyphicon-arrow-down"></span>
	 				</a>
 				@endif
 				<a href="{{url('/category/edit/'.$category_data->id)}}" class="btn btn-success">
 					<span class="glyphicon glyphicon-edit"></span>
 				</a>
 				<a href="{{url('/category/delete/'.$category_data->id)}}" class="btn btn-danger" onclick=" return confirm('are you sure to delele this')">
 					<span class="glyphicon glyphicon-trash"></span>
 				</a>

 			</td>
 			
 		</tr>
 	   @endforeach
 	</tbody>
 </table>



 @endsection