@extends('layouts.app')


<style>
      /*form{
        margin: 100px auto;
        border: 1px solid gray;
        padding: 20px 15px;
        box-shadow: 5px 5px 10px gray;
        max-width: 500px;
      }
      form p{
        margin-bottom: 30px;
      }
*/
 body{
        background-image:url('img/login.jpg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
      }
      form{
        margin: 100px auto;
        border: 1px solid rgba(201,217,207,0.3);
        padding: 20px 15px;
        box-shadow: 3px 3px 7px #182128;
        max-width: 500px;
        background-color:rgba(201,217,207,0.1);
      }
      .divider-text {
    position: relative;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}
.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>
@section('content')
<form method="POST" action="{{ route('register') }}">
@csrf
 
<form>
<article class="card-body mx-auto" style="max-width: 400px;">
   <div class="container">
    <div id="pesan">
  <h4 class="card-title mt-3 text-center" style="color:white;">Create Account</h4>
  <p class="text-center" style="color:white;">Get started with your free account</p>
  
  <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input id="name" placeholder="Full name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input id="email" placeholder="Email address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input id="password" placeholder="Create password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
    </div>
        <input id="password-confirm" placeholder="Repeat password" type="password" class="form-control" name="password_confirmation" required>
      </div>                                      
    <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block" style="color:white;">
            {{ __('Register') }}
        </button>
    </div> <!-- form-group// -->      
    <p class="text-center" style="color:white;">Have an account? <a href="{{ route('login') }}">Log In</a> </p>                                                                 
      
   </div>
  </div> 
 </article> 
</form>
</form>
@endsection