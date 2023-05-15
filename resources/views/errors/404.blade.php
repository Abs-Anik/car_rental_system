@extends('errors.layouts.master')
@section('title')
    404 Error
@endsection
@section('content')
<div class="container text-center">
    <div class="brand">
        <span class="glyphicon glyphicon-road" aria-hidden="true"></span>
        <h3 class="text-uppercase">hireCAR!</h3>
    </div>
    <h1 class="head"><span>404</span></h1>
    <p>Oops! The Page you requested was not found!</p>
    <a href="{{route('welcome')}}" class="btn-outline"> Back to Home</a>
</div>
@endsection