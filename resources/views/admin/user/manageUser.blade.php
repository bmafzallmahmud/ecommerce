@extends('admin.master')

@section('mainContent')

</br>
	<h3 class="text-center text-success">{{Session::get('message')}}</h3>
</br>


  <table class="table table-bordered table-hover">
 	<thead>
 		<tr>
 		<th>id</th>
 		<th>User Name</th>
 		<th>User Email</th>
 		<th>Status</th>
 		</tr>
 	</thead>
 	<tbody>
 		
 		@foreach($users as $user)
 		<tr>
 			<td>{{$user->id}}</td>
 			<td>{{$user->name}}</td>
 			<td>{{$user->email}}</td>
 			<td>
 				<a href="" class="btn btn-success" name="edit">
 					<span class="glyphicon glyphicon-edit" ></span>
 				</a>
 				<a href="" class="btn btn-danger">
 					<span class="glyphicon glyphicon-trash"></span>
 				</a>

 			</td>
 			
 			

 		</tr>
 		@endforeach
 	</tbody>

 	  
 </table>



 @endsection