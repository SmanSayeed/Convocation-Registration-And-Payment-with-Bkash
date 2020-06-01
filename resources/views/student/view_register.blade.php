@extends('layouts.app')

@section('user_content')

<div style="padding:10px; margin-top:20px;">

<?php 
$p_key = Auth::user()->payment_key;
?>
@if($p_key==1)
	<a class="btn btn-danger" href="{{route('student-edit-register')}}">Edit Your Registration</a>
	<a class="btn btn-info" href="{{route('student-payment')}}">Complete Your Payment If Your Registration Information is Confirmed</a>
@endif
@if($p_key==2)
	<a class="btn btn-success">Download Convocation ID Card</a>
@endif
<br>

<br>
<h2 style="color:black;">Registered Information</h2>

<br>

<br>

<table class="table">


<tr>		<th class="text-color-black" scope="row">  Image: </th>
	<td class="text-color-black" scope="row"> <img src="{{asset('student_images')}}/{{$data->image}}" height="150px" width="100px"></td>
</tr>
<tr>
	<th  class="text-color-black" scope="row">Name: </th>
	<td class="text-color-black" scope="row">{{$data->username}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> Father's name: </th>
	<td class="text-color-black" scope="row">{{$data->father}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Mother's name: </th>
	<td class="text-color-black" scope="row">{{$data->mother}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Hall: </th>
	<td class="text-color-black" scope="row">{{$data->hall}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Faculty: </th>
	<td class="text-color-black" scope="row">{{$data->faculty}}</td>
</tr>
<tr>	<th class="text-color-black" scope="row"> Department: </th>
	<td class="text-color-black" scope="row">{{$data->dept}}</td>	
</tr>
<tr>
	<th class="text-color-black" scope="row"> Obtained Degree for Convcation : </th>

	<td class="text-color-black" scope="row"> @if($data->degree=="Bachelor's")Bechelor @elseif($data->degree=="Bachelor's and Master's") Bachelor and Master @endif</td>

	
</tr>
@if($data->degree=="Bachelor's")
<tr>
	<th class="text-color-black" scope="row"> Registration Number (Bachelor): </th>
	<td class="text-color-black" scope="row">{{$data->registrationnobsc}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Roll No (Bachelor): </th>
	<td class="text-color-black" scope="row">{{$data->rollnobsc	}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Session (Bachelor): </th>
	<td class="text-color-black" scope="row">{{$data->sessionbsc}}</td>
</tr>

<tr>

	<th class="text-color-black" scope="row"> CGPA (Bachelor): </th>

	<td class="text-color-black" scope="row"> {{$data->resultbsc}}</td>

	
</tr>




<tr>
	<th class="text-color-black" scope="row"> Have you collected your provisional certificate of Bachelor ?: </th>
	@if($data->certificateb==2)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td> @endif

</tr>

@endif
@if($data->degree=="Bachelor's and Master")
<tr>
	<th class="text-color-black" scope="row"> Registration Number (Bachelor ): </th>
	<td class="text-color-black" scope="row">{{$data->registrationnobsc}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Roll No (Bachelor): </th>
	<td class="text-color-black" scope="row">{{$data->rollnobsc	}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Session (Bachelor): </th>
	<td class="text-color-black" scope="row">{{$data->sessionbsc}}</td>
</tr>

<tr>

	<th class="text-color-black" scope="row"> CGPA (Bachelor): </th>

	<td class="text-color-black" scope="row"> {{$data->resultbsc}}</td>

	
</tr>




<tr>
	<th class="text-color-black" scope="row"> Have you collected your provisional certificate of Bachelor's ?: </th>
	@if($data->certificateb==2)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td> @endif

</tr>

<tr>
	<th class="text-color-black" scope="row"> Registration Number (Master): </th>
	<td class="text-color-black" scope="row">{{$data->registrationnomsc}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Roll No (Master): </th>
	<td class="text-color-black" scope="row">{{$data->rollnomsc	}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Session (Master): </th>
	<td class="text-color-black" scope="row">{{$data->sessionmsc}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> CGPA (Master): </th>

	<td class="text-color-black" scope="row"> {{$data->resultmsc}}</td>

	
</tr>


<tr>
	<th class="text-color-black" scope="row"> Have you  collected your provisional certificate Master ?: </th>

	@if($data->certificatem==1)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td>@endif
</tr>
@endif



<tr>
	<th class="text-color-black" scope="row"> Address: </th>
	<td class="text-color-black" scope="row">{{$data->address}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Current Job: </th>
	<td class="text-color-black" scope="row">{{$data->job}}</td>
</tr>









</table>
</div>

@endsection	