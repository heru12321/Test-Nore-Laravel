@extends('layout.maincrud')

@section('container')
<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">
<!-- Login form -->
<form class="login-form" action="/login" method="POST">
    @csrf
    <div class="card mb-0">
        <div class="card-body">
            <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">Login to your account</h5>
                <span class="d-block text-muted">Enter your credentials below</span>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-info alert-styled-right alert-arrow-right alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ session('success') }}!</span>
                </div>
            @elseif(session()->has('authfalse'))
            <div class="alert alert-danger alert-styled-right alert-arrow-right alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <span class="font-weight-semibold">{{ session('authfalse') }}!</span>
            </div>
            @endif

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="mail@mail.com" name="email" autofocus required value="{{ old('email') }}">
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
            </div>

            <div class="text-center">
                <span>Doesn't have an account? </span><a href="register">Register Now!</a>
            </div>
        </div>
    </div>
</form>
<!-- /login form -->
</div>

@endsection