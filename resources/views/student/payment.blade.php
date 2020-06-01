@extends('layouts.app')

@section('user_content')

<div style="color:black;padding:30px">
<p class="btn btn-danger"><b>Edit your information option</b> will be disabled after your payment. <a href="{{route('student-edit-register')}}" class="btn btn-info">Edit your information</a> </p>
<h2>Payment for Convocation</h2><br>
<div class="alert alert-info alert-block">

	<h5>

		<strong>
			Please Read Carefully Before Payment....!!!
		</strong>

	</h5>
			<ul>
				<li>Make sure you have sufficient balance in your bkash account number</li>
				<li>Read Bkash Payment Guideline <a href="#" >Click here</a></li>
				<li>Click the <strong>bKash Payment</strong>  button for further action</li>
                <li>Please wait for 1 to 5 min before the bkash pop up appears after clicking <strong>bKash Payment</strong>  button</li>
                 <li><strong>Wait for 10 minutes to pay same amount of taka from same bkash number.<span style="color:red">( Payment will not be completed if you try to pay same amount of taka from same bkash number within 10 minutes. )</span></strong></li>

			</ul>

</div>
<br><br>
<table width="100%" class="table_payment" style="background-color:#ccc;padding:30px;">

    <tr style="text-align: center;">
        <th style="border-bottom:1px solid black;border-right   :1px solid black;">Your name</th>
        <th style="border-bottom:1px solid black;border-right   :1px solid black;">Invoice No.</th>
        <th style="border-bottom:1px solid black;border-right   :1px solid black;">Amount</th>
        <th style="border-bottom:1px solid black;border-right   :1px solid black;">Action <small>(Click the button for payment)</small></th>
    </tr>
    <tbody>
  
        <tr style="text-align: center;">
            <td style="border-bottom:1px solid black;border-right   :1px solid black;"><?php echo Auth::user()->name;?></td>
            <td style="border-bottom:1px solid black;border-right   :1px solid black;"><?php echo Auth::user()->id ?></td>

            <td style="border-bottom:1px solid black;border-right   :1px solid black;">
           @if($data->degree=="Bachelor's")
            1
          @elseif($data->degree=="Bachelor's's and Master's")
              2
              @endif  

            </td>
            <td style="border-bottom:1px solid black;border-right   :1px solid black;">
                <form method="POST" action='{{route("bkash_checkout_action")}}'>
                @csrf
                    <input type="hidden" name="payerReference" value="12">
                    <input type="hidden" name="ref_no" value="{{Auth::user()->id}}">
                    <input type="hidden" name="order_code" value="12">
                     <input type="hidden" name="degree" value="{{$data->degree}}">
                    <input type="hidden" name="amount" value="
                    <?php if($data->degree=="Bachelor's")
                        { echo "1"; }
                        else if($data->degree=="Bachelor's's and Master's")
                              { echo "2"; }
                    ?>
                    ">
                  
                    <input type="hidden" name="success_url" value="{{route('student-payment-status',['status'=>'success'])}}">
                       <!-- <input type="hidden" name="success_url" value="http://localhost:8003?status=success"> -->
                    <input type="hidden" name="failed_url" value="{{route('student-payment-status',['status'=>'failed'])}}">
                      <!-- <input type="hidden" name="failed_url" value="http://localhost:8003?status=failed"> -->
                    <button type="submit" class="btn btn-sm btn-light" style="padding:10px;margin:10px;"><img src="{{asset('user')}}/img/bKash-Payment-logo.png"></button>
                </form>
            </td>
        </tr>
 
    </tbody>

</table>

</div>

@endsection	