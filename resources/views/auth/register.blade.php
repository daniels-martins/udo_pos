@extends('layouts.auth')

@section('content')
<div class="card-body register-card-body">
  <p class="login-box-msg">Register a new membership</p>

  <form action="{{ route('register') }}" method="post"> @csrf
    {{-- Email field --}}
{{-- @if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif --}}

    <div class="input-group mb-3">
      <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" id='email'>
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    @error('email') <div class="error text-danger">{{ $message }} </div>@enderror

    {{-- Type password --}}
    <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Password" required autocomplete="new-password" id="password" name="password">

      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>

    {{--Confirm password --}}
    <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Retype password" id="password_confirmation" name="password_confirmation" required>

      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    @error('password') <div class="error text-danger">{{ $message }} </div>@enderror
    </div>

	{{-- Terms and Conditions --}}
    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="agreeTerms" name="terms" value="agree" required  />
          <label for="agreeTerms">
            I agree to the <a href="#">terms</a>
          </label>
        </div>
      </div><!-- /.col -->

      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  {{-- laravel socialite coming soon --}}
  {{-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div> --}}
  <a href="{{ route('login') }}" class="text-center">{{ __('Already registered?') }}</a>
</div>
@endsection