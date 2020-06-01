@extends('admin.admin_master')
@section('admin_content')

<div style="color:black;padding:30px;">
<h2>Payment Status</h2>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>

@endif
<?php if($p=='0') {?>
	<div class="alert alert-default alert-block">
	<span style="color:red">  <strong>Payment not completed</strong></span>	
    
</div>
<?php
}else{
?>
<table style="color:black">
	
	
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Database Id</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->id}}</td>
	</tr>
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Payment Id</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_paymentid}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash trxID</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_trxID}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Currency</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_currency}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Amount</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_amount}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash intent</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_intent}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash invoice no</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_merchantinvoicenumber}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash transaction status</td>
		<td style="color:black;padding:5px;border:1px solid black"><span style="color:green"><strong>{{$p->bkash_transactionStatus}}</strong></span></td>
	</tr>
	
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Payment completion time</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_createtime}}</td>
	</tr>
</table>
<?php } ?>

</div>



<hr>


<div style="padding:10px; margin-top:20px;">
<h2 style="color:black;">User Information</h2>
<br>

<br>

<table class="table">

<tr>	
<tr>
	<th  class="text-color-black" scope="row">Id: </th>
	<td class="text-color-black" scope="row">{{$u->id}}</td>
</tr>	

<tr>
	<th  class="text-color-black" scope="row">Name: </th>
	<td class="text-color-black" scope="row">{{$u->name}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> email: </th>
	<td class="text-color-black" scope="row">{{$u->email}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Mobile No: </th>
	<td class="text-color-black" scope="row">{{$u->mobile}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> User registration time: </th>
	<td class="text-color-black" scope="row">{{$u->created_at}}</td>
</tr>

</table>









<hr>












<div style="padding:10px; margin-top:20px;">
<h2 style="color:black;">Final Registered Information</h2>
<br>

<br>

<table class="table">


<tr>		<th class="text-color-black" scope="row">  Image: </th>
	<td class="text-color-black" scope="row"> <img src="{{asset('student_images')}}/{{$d->image}}" height="150px" width="100px"></td>
</tr>
<tr>
	<th  class="text-color-black" scope="row">Name: </th>
	<td class="text-color-black" scope="row">{{$d->username}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> Father's name: </th>
	<td class="text-color-black" scope="row">{{$d->father}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Mother's name: </th>
	<td class="text-color-black" scope="row">{{$d->mother}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Hall: </th>
	<td class="text-color-black" scope="row">{{$d->hall}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Faculty: </th>
	<td class="text-color-black" scope="row">{{$d->faculty}}</td>
</tr>
<tr>	<th class="text-color-black" scope="row"> Department: </th>
	<td class="text-color-black" scope="row">{{$d->dept}}</td>	
</tr>
@if($d->resultbsc!='null')
<tr>
	<th class="text-color-black" scope="row"> Registration Number (Bachelor's): </th>
	<td class="text-color-black" scope="row">{{$d->registrationnobsc}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Roll No (Bachelor's): </th>
	<td class="text-color-black" scope="row">{{$d->rollnobsc	}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Session (Bachelor's): </th>
	<td class="text-color-black" scope="row">{{$d->sessionbsc}}</td>
</tr>

<tr>

	<th class="text-color-black" scope="row"> CGPA (Bachelor's): </th>

	<td class="text-color-black" scope="row"> {{$d->resultbsc}}</td>

	
</tr>
@endif
@if($d->resultmsc!='null')
<tr>
	<th class="text-color-black" scope="row"> Registration Number (Master's): </th>
	<td class="text-color-black" scope="row">{{$d->registrationnomsc}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Roll No (Master's): </th>
	<td class="text-color-black" scope="row">{{$d->rollnomsc	}}</td>
</tr>

<tr>
	<th class="text-color-black" scope="row"> Session (Master's): </th>
	<td class="text-color-black" scope="row">{{$d->sessionmsc}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> CGPA (Masters's): </th>

	<td class="text-color-black" scope="row"> {{$d->resultmsc}}</td>

	
</tr>
@endif
<tr>
	<th class="text-color-black" scope="row"> Obtained Degree for Convcation : </th>

	<td class="text-color-black" scope="row"> {{$d->degree}}</td>

	
</tr>



<tr>
	<th class="text-color-black" scope="row"> Have you collected your provisional certificate of Bachelor's?: </th>
	@if($d->certificateb==2)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td> @endif

</tr>


<tr>
	<th class="text-color-black" scope="row"> Have you  collected your provisional certificate Master's?: </th>

	@if($d->certificatem==1)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td>@endif
</tr>

<tr>
	<th class="text-color-black" scope="row"> Address: </th>
	<td class="text-color-black" scope="row">{{$d->address}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Current Job: </th>
	<td class="text-color-black" scope="row">{{$d->job}}</td>
</tr>









</table>
</div>
@endsection	