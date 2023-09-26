@extends('layouts.app')
@section('title','Forgot')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">

    
    

    <div class="col-md-5 right-box p-5 border rounded-5 bg-white shadow ">
        <div class="row align-items-center a">
            <div class="header-text mb-4">
                <div class="d-flex flex-row align-items-center justify-content-center"> <img src="{{ asset('assets/images/dvc-logo.png') }} " style="width: 70px;">  
                    <h2 style="font-size: 80px; font-weight: bold; margin: 0; color: rgb(86, 86, 250);" >DVC</h2></div>
           
                    <p class="text-center mt-0 fs-5">DAVAO VISION COLLEGE</p>
            </div>
            
        </div>
        <form action="">
            @csrf
        <div class="input-group mb-3">
            <p class="text-secondary">Enter your e-mail address and we will send you a link to reset your password</p>
            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address">
    
        </div>
 
       
        <div class="input-group mb-3">
            <button class="btn btn-lg btn-primary w-100 fs-6">RESET PASSWORD</button>
        </div>
        <div class="row">
            <small>Back to <a href="/">Login</a></small>
    
        </div>
    </form>
       
    </div>
    
  
    
    </div>
    
@endsection

@section('script')


@endsection