@extends('errors.layouts.master')
@section('title')
    500 Error
@endsection
@section('content')
<div class="container text-center">
    <div class="brand">
        <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
        <h3 class="text-uppercase">hireMe!</h3>
    </div>
    <h1 class="head"><span>500</span></h1>
    <p>Oops! Internal Server Error</p>
    <a href="{{route('welcome')}}" class="btn-outline"> Back to Home</a>
</div>
@endsection