@extends('layouts.app')

@section('user_content')

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="padding:30px">
            <div class="card">
                <div class=" text-color-black"><h3>Dashboard</h3></div>
                <hr>
                <div class=" text-color-black">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h4> Hello {{Auth::user()->name}},</h4>
                   <a class="btn btn-lg btn-primary" href="{{route('student-final-register')}}" style="margin-top:40px;">Registration Form</a>

                    <a class="btn btn-lg btn-primary" href="{{route('student-final-register')}}">Payment for Convocation</a>
                     
                   <a class="btn btn-lg btn-primary" href="{{route('student-final-register')}}">Download Convocation ID Card</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection