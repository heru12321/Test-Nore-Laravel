<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="{{ asset('bootstraptemplate') }}/global_assets/images/logo_light.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
            <i class="icon-unfold"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        @auth
        <span class="badge bg-success ml-md-3 mr-md-auto">Logged in</span>
        @else
        <span class="badge bg-info ml-md-3 mr-md-auto">Not logged in</span>
        @endauth
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                    @auth
                    <span><i class="icon-user mr-2"></i> {{ auth()->user()->name }}</span>
                    @else
                    <span>Not yet</span>
                    @endauth
                </a>
                @auth
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-browser"></i> Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <form action="logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item" href="#" onclick="return confirm('Are you sure to Logged Out?')"><i class="icon-switch2"></i> Logout</button>
                    </form>
                </div>
                @endauth
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->