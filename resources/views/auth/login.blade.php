@php
    if(isset($_COOKIE['login_username']) && isset($_COOKIE['login_password']))
    {
        $login_username = $_COOKIE['login_username'];
        $login_password = $_COOKIE['login_password'];
        $is_remember = "checked='checked'";
    }else{
        $login_username = '';
        $login_password = '';
        $is_remember = '';
    }
@endphp

@extends('auth.layouts.master_login_register')
@section('title')
    Login
@endsection

@section('content')
<div class="auth-form-light text-left py-5 px-4 px-sm-5">

    <div class="brand-logo">
      <img src="{{asset('public/userpanel/assets/images/logo.svg')}}" alt="logo">
    </div>
    <h4>Hello! let's get started</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="exampleInputEmail1" placeholder="Username" name="username" value="{{ $login_username }}">
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password" value="{{ $login_password }}">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="mt-3">
        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>

        {{-- <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button> --}}
      </div>
      <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check ml-4 checkbox-custom">
            <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" {{ $is_remember }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
        @endif
        
      </div>
      {{-- <div class="mb-2">
        <button type="button" class="btn btn-block btn-facebook auth-form-btn">
          <i class="ti-facebook mr-2"></i>Connect using facebook
        </button>
      </div> --}}
      <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="register.html" class="text-primary">Create</a>
      </div>
    </form>
  </div>
@endsection

{{-- @extends('auth.layouts.master_login_register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus value="{{ $login_username }}">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6"> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{ $login_password }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" {{ $is_remember }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
