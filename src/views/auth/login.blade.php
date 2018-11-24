@extends('layout.auth')

@section('title','Login')

@section('content')
<div class="auth-box ">
    <div class="left">
        <div class="content">
            <div class="header">
                <div class="logo text-center"><img src="{{ asset('admin/img/logo-dark.png') }}" alt="Klorofil Logo"></div>
                <p class="lead">Login to your account</p>
            </div>
            <form class="form-auth-small" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label for="signin-email" class="control-label sr-only">Email</label>
                    <input type="email" class="form-control" id="signin-email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="signin-password" class="control-label sr-only">Password</label>
                    <input type="password" class="form-control" id="signin-password" name="password" placeholder="Password">
                </div>
                <div class="form-group clearfix">
                    <label class="fancy-checkbox element-left">
                        <input type="checkbox">
                        <span>Remember me</span>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                <div class="bottom">
                    <span class="helper-text"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                </div>
            </form>
        </div>
    </div>
    <div class="right">
        <div class="overlay"></div>
        <div class="content text">
            <h1 class="heading">Free Bootstrap dashboard template</h1>
            <p>by The Develovers</p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection