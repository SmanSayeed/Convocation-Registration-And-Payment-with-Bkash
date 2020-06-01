@extends('admin.admin_master')
@section('admin_content')
<h2>Create Notice</h2>
<hr>
<form action="admin_store_notice" method="POST">
@csrf
<table>
	<tr>
	<td>Title</td>
		<td >
			<input type="text" name="title" placeholder="title" >
		</td>
	</tr>

<tr>
<td style="width:200px">Description</td>
		<td >
			
	<textarea name="description" rows="10" cols="10"></textarea> 
		</td>

</tr>
<tr>
	<td></td>
	<td><button name="submit">Submit</button></td>
</tr>
	</table>
</form>



@endsection	