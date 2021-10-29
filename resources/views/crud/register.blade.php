@extends('layout.maincrud')

@section('container')
<!-- Custom background -->
<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">
    <div class="col-md-12">
<form action="/register" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header header-elements-inline">
            <h4 class="card-title">Register Form</h4>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label>Your name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Dande Rambo" name="name" required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Your password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Your strong password" name="password" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Your email:</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Choose your active email" name="email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Your position:</label>
                <input type="text" class="form-control @error('as') is-invalid @enderror" placeholder="INI Select" name="as" required value="{{ old('as') }}">
                @error('as')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Your address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Wakanda, Avenger Tower 2nd floor" name="address" required value="{{ old('address') }}">
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Your profil picture:</label>
                <input type="file" class="form-control @error('profilepic') is-invalid @enderror" name="profilepic">
                @error('profilepic')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-0">
                <label>Your bio:</label>
                <textarea rows="3" cols="3" class="form-control" placeholder="*Optional, enter your bio" name="bio">{{ old('bio') }}</textarea>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center bg-teal-400 border-top-0">
            <a href="login" class="btn bg-transparent text-white border-white border-2">Cancel</a>
            <button type="submit" class="btn btn-outline bg-white text-white border-white border-2">Submit form <i class="icon-paperplane ml-2"></i></button>
        </div>
    </div>
</form>
</div>
</div>
<!-- /custom background -->


@endsection