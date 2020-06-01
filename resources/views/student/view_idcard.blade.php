@extends('layouts.app')

@section('user_content')

<div style="padding:10px; margin-top:20px;">
<h2 style="color:black;">Registered Information</h2>
<br>
<!-- <h4 style="color:#aa2233;">Please complete your payment within next 72 hours.</h4> -->
<br>

<button class="btn btn-primary"  type="button" id="pdfDownloader">Download and Print</button>
@if($data->convocid==null)
<a class="btn btn-primary"  type="button" href="{{route('student-view-idcard')}}">Generate Convocation ID</a>
@endif
<!-- <a class="btn btn-primary" href="{{route('student-download-idcard')}}">Print</a>
 <a class="btn btn-primary" href="{{route('student-download-idcard')}}">Download</a> -->
<br>
<br>
@if($data->convocid!=null)
<section class="idcard_main" id="printDiv" style="width:645px;">	

	<!-- 	<div class="row"  style="margin-bottom:10px;">
			<div class="col-md-12">
				<img class="center " src="{{asset('user/img')}}/cou3.png" >
			</div>
		</div> -->


<table>
	<tr>
		<td style="width:20%">
			<img class="center " src="{{asset('user/img')}}/cou3.png" >
		</td>
	
		<td style="width:60%">
		<p style="color:black;text-align:center;font-weight:bold;font-size:20px;margin-left:40px;	">COMILLA UNIVERSITY</p>
				<p style="color:black;text-align:center;font-weight:bold;font-size:18px;margin-left:40px;line-height:0px;	">1st Convocation - 2020</p>
			<p style="color:black;text-align:center;font-size:14px;margin-left:48px;line-height:5px;	">Date: 27th January, 2020</p>
		</td>
	
		<td style="width:20%">
		<!-- <h6 style="border:1px solid black;color:black; width:100px;
  height: 70px;margin-left:40px;padding-right:20px;margin-bottom:15px;">Logo</h6> -->
  	<img src="{{asset('user/img')}}/final_logo.png" style=" width:170px;
  height: 135px;margin-left:40px;padding-right:20px;margin-bottom:15px;">
			<!-- <img src="{{asset('student_images')}}/{{$data->image}}" height="120px" width="100px" style="margin-left:0px;margin-top:-36px;padding-right:-14px;margin-bottom:15px;"> -->
	
		</td>
	</tr>
</table>


<!-- 
	<div class="col-md-2">

		<h6 style="border:1px solid black;color:black; width:100px;
  height: 70px;margin-left:10px;padding-right:20px;margin-bottom:15px;">Logo</h6>
	</div>
	<div class="col-md-8">
			<p style="color:black;text-align:center;font-weight:bold;font-size:18px;margin-left:-15px;	">Comilla University 1st Convocation - 2020</p>
			<p style="color:black;text-align:center;font-weight:bold;font-size:14px;margin-left:-15px;	">Date: 27th January, 2020</p>
	
	</div>
	<div class="col-md-2">
		<img src="{{asset('student_images')}}/{{$data->image}}" height="150px" width="120px" style="margin-left:-41px;margin-top:-36px;padding-right:-14px;margin-bottom:15px;">
	</div>
</div> -->

<div class="row" style="padding:10px;color:black">
	<div class="col-md-12">
		<!-- <img class="center " src="{{asset('user/img')}}/cou2.jpg" > -->
		<h6 style="border:1px solid black;padding:5px;text-align:center;">CONFIRMATION OF REGISTRATION
			
		</h6>
	</div>

</div>


<div class="row" style="padding:10px;color:black">
	<div class="col-md-5">
		<!-- <img class="center " src="{{asset('user/img')}}/cou2.jpg" > -->
		<h6 style="border:1px solid black;padding:5px;">Convocation Id:&nbsp {{$data->convocid}}
			
		</h6>
	</div>

</div>
<div class="row" style="padding:10px;color:black">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<!-- <img class="center " src="{{asset('user/img')}}/cou2.jpg" > -->
		<h6 style="border-bottom:1px solid black;padding:5px;text-align:center;">Student Information
			
		</h6>
	</div>
		<div class="col-md-3">
		
	</div>

</div>

<div style="float:right;margin-top:30px;margin-right:20px">
	<img src="{{asset('student_images')}}/{{$data->image}}" height="120px" width="100px" style="margin-left:-96px;margin-top:-36px;padding-right:-14px;margin-bottom:15px;position:absolute;">
		<img src="{{asset('user/img')}}/seal.png" height="100px" width="100px" style="margin-left:-41px;margin-top:-36px;padding-right:-14px;margin-bottom:15px;position:absolute;left:525px;top:600px;">

</div>
<table class=" " style="width:500px;">

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
	<th class="text-color-black" scope="row"> Mobile Number: </th>
	<td class="text-color-black" scope="row">{{Auth::user()->mobile}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> TrxID: </th>
	<td class="text-color-black" scope="row">{{$b->bkash_trxID}}</td>
</tr>
<tr>
	<th class="text-color-black" scope="row"> Transaction Amount: </th>
	<td class="text-color-black" scope="row">{{$b->bkash_amount}}</td>
</tr>
<!-- 
<tr>
	<th class="text-color-black" scope="row"> Hall: </th>
	<td class="text-color-black" scope="row">{{$data->hall}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Faculty: </th>
	<td class="text-color-black" scope="row">{{$data->faculty}}</td>
</tr> -->

<!-- <tr>
	<th class="text-color-black" scope="row"> Obtained Degree for Convcation : </th>

	<td class="text-color-black" scope="row"> {{$data->degree}}</td>

	
</tr> -->



<!-- <tr>
	<th class="text-color-black" scope="row"> Have you collected your provisional certificate of Bachelor's?: </th>
	@if($data->certificateb==2)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td> @endif

</tr>


<tr>
	<th class="text-color-black" scope="row"> Have you  collected your provisional certificate Master's?: </th>

	@if($data->certificatem==1)<td class="text-color-black" scope="row">Yes</td>@else <td class="text-color-black" scope="row">No</td>@endif
</tr>

<tr>
	<th class="text-color-black" scope="row"> Address: </th>
	<td class="text-color-black" scope="row">{{$data->address}}</td>
</tr>


<tr>
	<th class="text-color-black" scope="row"> Current Job: </th>
	<td class="text-color-black" scope="row">{{$data->job}}</td>
</tr>
 -->








</table>

<div class="row" style="padding:10px;color:black">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<!-- <img class="center " src="{{asset('user/img')}}/cou2.jpg" > -->
		<h6 style="border-bottom:1px solid black;padding:5px;text-align:center;">Obtained Degree For Convocation
			
		</h6>
	</div>
		<div class="col-md-3">
		
	</div>

</div>
<table style="color:black;padding:3px;border:1px solid black;margin-bottom:20px;">
<tr>
	<th  style="color:black;padding:3px;border:1px solid black">Name of the degree</th>
	<th style="color:black;padding:3px;border:1px solid black">Department</th>
	<th style="color:black;padding:3px;border:1px solid black">Session</th>
	<th style="color:black;padding:3px;border:1px solid black">Roll No</th>
</tr>
	
@if($data->degree=="Bachelor's" )


<tr>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black"> Bachelor </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->dept}}</td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black"> {{$data->sessionbsc}} </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->rollnobsc}}</td>
</tr>

@endif
<!-- @if($data->degree=="Master's")

<tr>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black"> Master's </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->dept}}</td>
		<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black"> {{$data->sessionmsc}} </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->rollnomsc}}</td>
</tr>

@endif -->
@if( $data->degree=="Bachelor's and Master's" )

<tr>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">Bachelor </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->dept}}</td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->sessionbsc}} </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->rollnobsc}}</td>
</tr>
<tr>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">Master </td>
<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->dept}}</td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->sessionmsc}} </td>
	<td class="text-color-black" scope="row" style="color:black;padding:3px;border:1px solid black">{{$data->rollnomsc}}</td>
</tr>

@endif
</table>

<table  style="color:black">


<tr>
	<td style="width:200px;border:1px solid black;font-weight:bold">Convocation Kits</td>
	<td style="width:222px;border:1px solid black;font-weight:bold">Authorized Signature</td>
</tr>
<tr>
	<td style="width:200px;border:1px solid black;">Costume for convocation</td>
	<td style="width:222px;border:1px solid black;"><!-- <img src="{{asset('user/img')}}/sign.png" height="40px" width="100px" style="margin-left:22%"> --></td>	
</tr>
<tr>
	<td style="width:200px;border:1px solid black;">Gifts</td>
	<td style="width:222px;border:1px solid black;"><!-- <img src="{{asset('user/img')}}/sign.png" height="40px" width="100px" style="margin-left:22%"> --></td>	
</tr>
<tr>
	<td colspan="2"><p style="color:red;margin-top:10px;font-size:12px;">* Colour printed copy of this form is required to collect convocation kits</p></td>
	<td ></td>	
</tr>



</table>

<table style="color:black">
<tr >
	<td style="width:20%">	<!-- <p style="color:black;margin-top:110px;font-size:12px;">* Printed copy of this form is required to collect convocation kits</p> --></td>
	<td style="width:50%"></td>
	<td style="width:50%;text-align:center">
		<img src="{{asset('user/img')}}/sign.png" height="40px" width="100px" style="">
	<hr style="  border-top: 1px solid black;margin-top:10px; ">
				
				<p>(Signature)</p>


				<p style="line-height: 0.2;"><b>Dr. A K M Royhan Uddin</b></p>
				<small style="line-height: 0.2;">Convener,</small ><br>
				<small style="line-height: 0.2;">Organizing Committee,</small ><br>
				<small style="line-height: 0.2;">1st Convocation 2020,</small ><br>	
				<small style="line-height: 0.2;">Comilla University.</small ></td>	
</tr><!-- 
	<p style="line-height: 0.2;"><b>Dr. A K M Royhan Uddin</b></p>
				<small style="line-height: 0.2;">Convener,</small ><br>
				<small style="line-height: 0.2;">Organizing Committee, </small ><br>
				<small style="line-height: 0.2;">1st Convocation 2020, </small ><br>
				<small style="line-height: 0.2;">Comilla University.</small ></td> -->

</table><!-- 
<div class="row" style="">
		<div class="col-md-4">
			<p style="color:black;margin-top:110px;font-size:12px;">* Printed copy of this form is required to collect convocation kits</p>
		</div>
		<div class="col-md-2">
			
		</div>
		<div class="col-md-6" style="color:black;text-align:center;margin-top:-30px;">
				<hr style="  border-top: 1px solid black;margin-top:100px; ">
				<p>(Signature)</p>
				<p style="line-height: 0.2;"><b>Dr. A K M Royhan Uddin</b></p>
				<small style="line-height: 0.2;">Convener,</small ><br>
				<small style="line-height: 0.2;">Comilla University 1st Convocation Committee 2020.</small >
		</div>
</div>
 -->
</section>
@endif
</div>

@endsection	