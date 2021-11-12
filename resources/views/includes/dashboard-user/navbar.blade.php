<nav class="navbar navbar-expand-md navbar-light navbar-store fixed-top">
    <div class="container-fluid">
        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDashboard" aria-controls="navbarDashboard" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-light" id="navbarDashboard">
            <!--desktop menu -->
            <ul class="navbar-nav navbar-dashboard ms-auto d-none d-md-flex">
                <li class="nav-item dropdown me-4">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <img src="{{ auth()->user()->getAvatarUrl() }}" alt="user" class="rounded-circle mr-2 profile-picture shadow" style="width: 50px; height: 50px;" />
                        Hi, {{ Auth::user()->first_name }}
                    </a>
                    <div class="dropdown-menu text-black-50">
                        <a href="{{ route('home') }} " class="dropdown-item mb-2">
                            <i class="fas fa-home me-1 text-black-50"></i>
                            Home</a>
                        <a href="{{ route('account-customer') }} " class="dropdown-item mb-2">
                            <i class="fas fa-user-cog me-1 text-black-50"></i>
                            My Account</a>
                        <hr>
                        <a href="#" class="dropdown-item text-black-50" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt me-1 text-black-50"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
            <!-- mobile menu -->
            <ul class="navbar-nav d-block d-lg-none d-md-none">
                <li class="nav-item">
                    <a href="#" class="nav-link"> Hi, Wawan </a>
                </li>
                <li class="nav-item">
                    <a href=" {{ url('/') }} " class="nav-link d-inline-block"> Home </a>
                </li>
                <hr />
                <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
