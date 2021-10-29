@extends('layout.maincrud')

@section('container')
<!-- Cover area -->
<div class="profile-cover">
    <div class="profile-cover-img" style="background-image: url({{ asset('bootstraptemplate/global_assets/images/placeholders/cover.jpg') }}"></div>
    <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
        <div class="mr-md-3 mb-2 mb-md-0">
            <a class="profile-thumb">
                <img src="{{ asset('storage/' . auth()->user()->image . ' ') }}" class="border-white rounded-circle" width="48" height="48" alt="">
            </a>
        </div>

        <div class="media-body text-white">
            <h1 class="mb-0">{{ auth()->user()->name }}</h1>
            <span class="d-block">{{ auth()->user()->as }}</span>
        </div>

        <div class="ml-md-3 mt-2 mt-md-0">
            <ul class="list-inline list-inline-condensed mb-0">
                <li class="list-inline-item">
                    <form action="viewpdf" method="post" target="_blank">
                    @csrf
                    <input type="hidden" value="{{ auth()->user()->email }}" name="email">
                    <button type="submit" class="btn btn-light border-transparent"><i class="icon-file-pdf mr-2"></i>  User PDF</button>
                    </form>
                </li>
                <li class="list-inline-item">
                    <form action="viewexcel" method="post" target="_blank">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->email }}" name="email">
                        <button type="submit" class="btn btn-light border-transparent"><i class="icon-file-excel mr-2"></i>  User Excel</button>
                    </form>
                </li>
                <li class="list-inline-item">
                    <form action="delete" method="post">
                    @csrf
                    <input type="hidden" value="{{ auth()->user()->email }}" name="email">
                    <button type="submit" class="btn btn-danger border-transparent" onclick="return confirm('Are You Sure to Delete Your Account?')"><i class="icon-warning22 mr-2"></i> Delete Account <i class="icon-warning22"></i></button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /cover area -->

<!-- Profile navigation -->
<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="text-center d-lg-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-second">
            <i class="icon-menu7 mr-2"></i>
            Profile navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-second">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="#settings" class="navbar-nav-link active" data-toggle="tab">
                    <i class="icon-cog3 mr-2"></i>
                    Settings
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /profile navigation -->


<!-- Content area -->
<div class="content">

<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="tab-content w-100 order-2 order-md-1">
        <div class="tab-pane fade active show" id="settings">

            <!-- Profile info -->
            @if(session()->has('success'))
                <div class="alert alert-success alert-styled-right alert-arrow-right alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ session('success') }}!</span>
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger alert-styled-right alert-arrow-right alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{ session('error') }}!</span>
                </div>
            @endif
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Profile information</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="editprofile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" value="{{ auth()->user()->name }}" class="form-control" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="text" value="{{ auth()->user()->email }}" class="form-control" name="email" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>As</label>
                                    <input type="text" value="{{ auth()->user()->as }}" class="form-control" name="as">
                                </div>
                                <div class="col-md-8">
                                    <label>Bio</label>
                                    <textarea rows="3" class="form-control" name="bio">{{ auth()->user()->bio }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload profile image</label>
                                    <input type="hidden" value="{{ auth()->user()->image }}" class="form-control" name="oldimage">
                                    <input type="file" class="form-input-styled @error('profilepic') is-invalid @enderror" data-fouc name="profilepic"  id="sampul" onchange="previewImg();">
                                    
                                    @error('profilepic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    
                                    @if(auth()->user()->image)
                                    <img src="{{ asset('storage/' . auth()->user()->image . ' ') }}" class="img-preview mt-4">
                                    @else
                                    <img class="img-preview mt-4">
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /profile info -->


            <!-- Account settings -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Password settings</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="changepass" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>New password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    <input type="hidden" value="{{ auth()->user()->email }}" class="form-control" name="email">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Current password</label>
                                    <input type="password" placeholder="Enter old password to confirm" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" required>
                                    @error('oldpass')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /account settings -->

        </div>
    </div>
    <!-- /left content -->

</div>
<!-- /inner container -->

</div>
<!-- /content area -->

@endsection