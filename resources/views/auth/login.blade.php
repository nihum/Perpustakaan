@extends('layouts.app')

<style>
      body{
        background-image:url('img/bg-login.jpg');
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
      form p{
        margin-bottom: 30px;
      }
  </style>

@section('content')
<style>
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
        box-shadow: 3px 3px 7px #702b0d;
        max-width: 500px;
        background-color:rgba(201,217,207,0.1);
      }
      form p{
        margin-bottom: 30px;
      }
  </style>
  </head>
  <body>
    




<!-- Default form login -->
<form id="formLogin" action="{{ route('login') }}" method="post">
@csrf
      <div id="pesan">
        <?php
        if(isset($_GET['pesan'])){
          echo '<div class="alert alert-danger" role="alert">'.$_GET['pesan'].'</div>';
        }
        ?>
      </div>
<form class="text-center border border-light p-5">

    <p class ="h4 mb-4" style="color:white;"><strong>Sign in</strong></p>

    <!-- Email -->
    <input id="email" placeholder="Email" type="email" class="form-control mb-4{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

    <!-- Password -->
    <input id="password" placeholder="Password" type="password" class="form-control mb-4{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember" style="color:white;">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}" style="color:white;"><strong>
                    {{ __('Forgot Your Password?') }}
                    </strong>
                </a>
            @endif
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" style="color:white; background-color:rgb(183, 11, 5); border-color:black;"><strong>{{ __('Login') }}</strong></button>

    <!-- Register -->
    <p class="not" style="color:white;">Not a member?
        <a href="{{ route('register') }}" style="color:white;"><strong>Register</strong></a>
    </p>

</form>
</form>
@endsection