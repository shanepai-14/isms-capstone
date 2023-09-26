@extends('layouts.app')
@section('title','Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="row border rounded-5 bg-white shadow box-area ">
    
       @include('layouts.leftbox')
    <div class="col-md-6 right-box">
        <div class="row align-items-center a">
            <div class="header-text mb-4   ">
                <div class="d-flex flex-row align-items-center justify-content-center"> <img src="{{ asset('assets/images/dvc-logo.png') }} " style="width: 70px;">  
                    <h2 style="font-size: 80px; font-weight: bold; margin: 0; color: rgb(86, 86, 250);" >DVC</h2></div>
           
                    <p class="text-center mt-0 fs-5">DAVAO VISION COLLEGE</p>
            </div>
            
        </div>
        <div id="login_alert"></div>
        <form action="{{ route('auth.login')}}" method="POST" id="login_form">
            @csrf
            @method('post')
        <div class="input-group mb-3">
            <input type="text" name="login" id="login" class="form-control form-control-lg bg-light fs-6" placeholder="Email or Username">

       <div class="invalid-feedback"></div>
        </div>
        <div class="input-group mb-1">
            <input type="password" name="password" id="password" autocomplete="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password">
            <div class="invalid-feedback"></div>
        </div>
        <div class="input-group mb-5 d-flex justify-content-between">
            <div class="form-check">
          <input type="checkbox" class="form-check-input" id="formCheck">
          <label for="formCheck" class="for-check-label text-secondary">Remember me</label>
        </div>
        <div class="forgot">
            <small><a href="/forgot">Forgot Password?</a></small>
        </div>
        </div>
        <div class="input-group mb-3">  
            <button type="submit" id="login_btn" class="btn btn-lg btn-primary w-100 fs-6" >Login</button>
        </div>
    </form>
        <div class="row">
            <small>Don't have an Account? <a href="/register">Register</a></small>
    
        </div>
    
    </div>
    
    </div>
    
    </div>
    
@endsection

@section('script')
{{-- <script>
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    try {
        $(function(){
        $("#login_form").submit(function(e){
            e.preventDefault();
            $("#login_btn").val('Please Wait...');
            // Get the values from the form inputs
            var login = $("#login").val();
            var password = $("#password").val();

            // Send the login data via Ajax
            $.ajax({
                url: '{{ route('auth.login') }}',
                method: 'post',
                data: { login: login, password: password },
                dataType: 'json',
                success: function(res){
                   if(res.status == 400){ 
                    showError('login',res.messages.email);
                    showError('password',res.messages.password);
                    $("#login_btn").val('login');
                   }else if(res.status == 401){
                  $("#login_alert").html(showMessage('danger',res.messages));
                  $("#login_btn").val('login');
                   }else{
                      if(res.status == 200 && res.messages == 'success'){
                        window.location = '{{ route('auth.register')}}';
                      }
                   }
                }
            });
        });
    });
} catch (error) {
    console.error('An error occurred:', error.message);
}

   
</script> --}}



@endsection