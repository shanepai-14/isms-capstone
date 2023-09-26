@extends('layouts.app')
@section('title','Reset Password')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">

    
    

    <div class="container col-md-5 w-9 right-box p-5 border rounded-5 bg-white shadow ">
        <div class="row align-items-center a ">
            <div class="header-text mb-0">
                <div class="d-flex flex-row align-items-center justify-content-center"> <img src="{{ asset('assets/images/dvc-logo.png') }} " style="width: 70px;">  
                    <h2 style="font-size: 80px; font-weight: bold; margin: 0; color: rgb(86, 86, 250);" >DVC</h2></div>
           
                    <p class="text-center mt-0 fs-5">DAVAO VISION COLLEGE</p>
            </div>
            
        </div>
        <h3 class="text-center mb-4">RESET PASSWORD</h3>
        <form action="" method="POST" id="reset_form">
           
            @csrf
            <div class="input-group mb-3">
                <input type="password" name="npass" id="npass" class="form-control form-control bg-light fs-6" placeholder="New Password">
        
            </div>
            <div class="input-group mb-3">
                <input type="password" name="cnpass" id="cnpass" class="form-control form-control bg-light fs-6" placeholder="Confirm New Password">
        
            </div>
 
       
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6" id="reset_btn">Update Password</button>
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