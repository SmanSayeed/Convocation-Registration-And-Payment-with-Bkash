@extends('admin.admin_master')
@section('admin_content')


	<table class="table">
			
			<tr>
				<th colspan="col">Name</th>
				<th colspan="col">Email</th>
				
			</tr>
@foreach($data as $d)
			<tr>
				<td>{{$d->name}}</td>
				<td>{{$d->email}}</td>
			
			</tr>
@endforeach


	</table>

@endsection	