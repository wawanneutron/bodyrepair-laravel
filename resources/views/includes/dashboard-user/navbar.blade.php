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
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=joko&background=1f1235&color=ffffff" alt="user" class="rounded-circle mr-2 profile-picture shadow" width="50" />
                        Hi, Wawan
                    </a>
                    <div class="dropdown-menu text-black-50">
                        <a href="{{ url('/') }} " class="dropdown-item mb-2"> Home</a>
                        <a href="#" class="dropdown-item text-black-50" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
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
