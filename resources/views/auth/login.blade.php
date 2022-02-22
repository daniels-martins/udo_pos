@extends('layouts.auth')
@section('content')
<div class="card-body login-card-body">
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="{{ route('login') }}" method="post"> @csrf
    {{-- 'Email' field --}}
    @error('email') <div class="error text-danger">{{ $message }} </div>@enderror
    <div class="input-group mb-3">
      <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required autofocus />
      <div class="input-group-append">
        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
      </div>
    </div>

    {{-- password field --}}
    <div class="input-group mb-3">
      <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete="current-password">

      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Remember me -->
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember">
          <label for="remember">Remember Me</label>
        </div>
      </div><!-- /.col -->

      <!-- Sign In Button -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div><!-- /.col -->
    </div>
  </form>

  {{-- coming soon --- laravel socialite --}}

  {{-- <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div> --}}
  <!-- /.social-auth-links -->

  <p class="mb-1">
    <a href="{{ route('password.request') }}">I forgot my password</a>
  </p>
  <p class="mb-0">
    <a href='{{ route("register") }}' class="text-center">Register a new membership</a>
  </p>
</div>
@endsection
