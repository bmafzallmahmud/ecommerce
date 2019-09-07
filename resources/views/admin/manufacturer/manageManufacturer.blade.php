@extends('admin.master')

@section('mainContent')

</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 		<th>id</th>
 		<th>Manufacturer Name</th>
 		<th>Manufacturer Description</th>
 		<th>Publishus</th>
 		<th>Status</th>
 		</tr>
 	</thead>
 	<tbody>
 		@foreach($manufacturer as $manufacturer_data )
 		<tr>
 			<td>{{$manufacturer_data->id}}</td>
 			<td>{{$manufacturer_data->manufacturerName}}</td>
 			<td>{{$manufacturer_data->manufacturerDescription}}</td>
 			<td>{{$manufacturer_data->publicationStatus == 1 ? 'Publish':'Unpublish'}}</td>
 			<td>
 				<a href="{{url('/manufacturer/edit/'.$manufacturer_data->id)}}" class="btn btn-success">
 					<span class="glyphicon glyphicon-edit"></span>
 				</a>
 				<a href="{{url('/manufacturer/delete/'.$manufacturer_data->id)}}" class="btn btn-danger" onclick=" return confirm('are you sure to delele this')">
 					<span class="glyphicon glyphicon-trash"></span>
 				</a>

 			</td>
 			
 		</tr>
 	   @endforeach
 	</tbody>
 </table>



 @endsection