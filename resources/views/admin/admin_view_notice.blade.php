@extends('admin.admin_master')
@section('admin_content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<table>
	<tr style="padding:5px;border:1px solid black;">
		<th style="padding:5px;border:1px solid black;">Title</th>
		<th style="padding:5px;border:1px solid black;">Description</th>
		<th style="padding:5px;border:1px solid black;">Action</th>
	</tr>
	@foreach($data as $d)
	<tr style="padding:5px;border:1px solid black;">
		<td style="padding:5px;border:1px solid black;">{{$d->title}}</td>
		<td style="padding:5px;border:1px solid black;">{{$d->description}}</td>
		<td style="padding:5px;border:1px solid black;"> <a href="{{route('admin_edit_notice',['id'=>$d->id])}}" class="btn btn-primary">Edit</a>&nbsp;<a href="{{route('admin_delete_notice',['id'=>$d->id])}}" class="btn btn-primary" onclick="alert('Do you want to delete this notice ?');" >Delete</a></td>
	</tr>
	@endforeach
</table>
@endsection	