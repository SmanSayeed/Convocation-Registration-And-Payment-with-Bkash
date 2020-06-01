@extends('layouts.app')

@section('user_content')
<div class="container" style="color:black">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top:10px;">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

                        <div class="alert alert-danger" role="alert" style="margin-top:50px;">
                            <span>Waring..!! Sometimes email verification can go to your <b>spam</b>. Please check your spam from your email inbox and mark as "Not Spam" to enable link of verification email. </span>
                        </div>

                </div>

                   
            </div>
              <div class="alert alert-success" role="alert">
                            <span>If you have verified email from another device go to &nbsp;<a href="{{route('home')}}">Dashboard</a> </span>
                        </div>
        </div>
    </div>
</div>
@endsection
