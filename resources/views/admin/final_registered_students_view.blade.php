@extends('admin.admin_master')
@section('admin_content')


	<table class="table">
			
			<tr>
				<th colspan="col">id</th>
				<th colspan="col">Name</th>
				<th colspan="col">Email</th>
			
				<th colspan="col">Image</th>
				<th colspan="col">Payment Status</th>
				<th>Details</th>
				
			</tr>
@foreach($data as $d)
			<tr>
				<td>{{$d->id}}</td>
				<td>{{$d->username}}</td>
				<td>{{$d->email}}</td>
				
				<td>{{$d->faculty}}</td>	
				<td>{{$d->dept}}</td>
				
				<td><img src="{{asset('student_images')}}/{{$d->image}}" height="150px" width="100px"></td>
				<td> 
						@if($d->payment_key==2) <span style="color:green">  Payment Completed </span>  @else <span style="color:green">  Payment Completed </span> @endif 
				</td>
				<td><a href="{{route('admin-final-student-profile',['id'=>$d->id])}}" class="btn btn-success">View Details</a></td>
			
			</tr>
@endforeach
d->id

	</table>

@endsection	