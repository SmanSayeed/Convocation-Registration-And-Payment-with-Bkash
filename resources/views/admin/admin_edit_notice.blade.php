@extends('admin.admin_master')
@section('admin_content')
<h2>Create Notice</h2>
<hr>
<form action="{{route('admin_edit_notice',['id'=>$data->id])}}" method="POST">
@csrf
<table>
	<tr>
	<td>Title</td>
		<td >
			<input type="text" name="title" placeholder="title" value="{{$data->title}}">
		</td>
	</tr>

<tr>
<td style="width:200px">Description</td>	
		<td >
			
	<textarea name="description" rows="10" cols="10" >{{$data->description}}</textarea> 
		</td>

</tr>
<tr>
	<td></td>
	<td><button name="submit">Submit</button></td>
</tr>
	</table>
</form>



@endsection	