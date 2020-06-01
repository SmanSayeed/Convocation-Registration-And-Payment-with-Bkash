@extends('layouts.app')

@section('user_content')

@auth

<?php 

  $final_key = Auth::user()->final_key;
  $payment_key = Auth::user()->payment_key;

 ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding:30px">
            <div >
                <div class=" text-color-black"><h3>Final Registration And Pay For Convocation</h3></div>
            <hr>
           

           @if($final_key == 0) 
            
                <div class=" text-color-black">
                  

                  
                   <a class="btn btn-lg btn-primary" href="{{route('student-final-register')}}" style="margin-bottom:20px;">Registration Form</a>


                </div>
            @endif
            @if($final_key == 1)

                @if($payment_key==1)
                <div class=" text-color-black">
                  

                  
                   <a class="btn btn-lg btn-primary" href="{{route('student-payment')}}" style="margin-bottom:20px;">Payment for Convocation</a>


                </div>
                @endif

     
                <div class=" text-color-black">
                  

                  
                   <a class="btn btn-lg btn-primary" href="{{route('student-payment-status')}}" style="margin-bottom:20px;">Payment Status</a>


                </div>
                @if($payment_key==2)
                <div class=" text-color-black">
                  

                  
                   <a class="btn btn-lg btn-primary" href="{{route('student-view-idcard')}}" style="margin-bottom:20px;"> Convocation ID Card</a>


                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
</div>
@endauth
@endsection
