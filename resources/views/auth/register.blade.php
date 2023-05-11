@extends('auth.layouts.master_login_register')
@section('title')
    Registration
@endsection

@section('content')
<div class="col-lg-6 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">

        <div class="brand-logo">
        <img src="{{asset('public/userpanel/assets/images/logo.svg')}}" alt="logo">
        </div>
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form class="pt-3" method="POST" action="{{ route('register') }}">
                @csrf
            <div class="form-group">
                <input type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="exampleInputEmail1" placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password-confirm" placeholder="Confirm Password" name="password_confirmation">
            </div>

            <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
            </div>
            <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="{{route('login')}}" class="text-primary">SIGN IN</a>
            </div>
        </form>
    </div>
</div>

@endsection