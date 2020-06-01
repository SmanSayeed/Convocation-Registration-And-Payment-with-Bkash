@extends('layouts.app')

@section('user_content')

<div style="color:black;padding:30px;">
<h2>Payment Status</h2>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>

@endif

@if(!empty($errorp))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $errorp }}</strong>
        <a type="button" class="btn btn-info" href="{{route('student-payment')}}">Try To Pay Again</a>
</div>

@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
        <a type="button" class="btn btn-info" href="{{route('student-payment')}}">Try To Pay Again</a>
</div>

@endif
<?php if($p=='0') {?>
	<div class="alert alert-danger alert-block">
	<span >  <strong>Payment not completed.</strong></span>	
	<a type="button" class="btn btn-info" href="{{route('student-payment')}}">Try To Pay Again</a>
    
</div>
<?php
}else{
?>
<table style="color:black">
	
	
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash trxID</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_trxID}}</td>
	</tr>
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Amount</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_amount}}</td>
	</tr>
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash currency</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_currency}}</td>
	</tr>

	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash Invoice Number</td>
		<td style="color:black;padding:5px;border:1px solid black">{{$p->bkash_merchantinvoicenumber}}</td>
	</tr>
	<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Bkash transaction status</td>
		<td style="color:black;padding:5px;border:1px solid black"><span style="color:green"><strong>{{$p->bkash_transactionStatus}}</strong></span></td>
	</tr>
	
	<!--<tr style="color:black;padding:5px;border:1px solid black">
		<td style="color:black;padding:5px;border:1px solid black">Payment completion time</td>
		<td style="color:black;padding:5px;border:1px solid black">

		{{$p->bkash_createtime}}

		</td>
	</tr>-->
</table>
<?php } ?>

</div>
@endsection	