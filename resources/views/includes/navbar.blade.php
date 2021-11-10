<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ url('/images/mbs_logo_transparent.png') }}" width="100" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-4">
                        <a class="nav-link" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="#kontak">Contact</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link" href="#tracking">Tracking</a>
                    </li>
                </ul>
                @auth
                    <ul class="navbar-nav me-3 ">
                        <li class="nav-item dropdown">
                            {{-- <a class="nav-link dropdown-toggle btn btn-cte-auth" style="padding: 5px 20px; color: #fff;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                Account
                            </a> --}}
                            <a href="#" class="nav-link nav-avatar" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name }}=joko&background=ff8906&color=ffffff" alt="user"
                                     class="rounded-circle me-2 profile-picture shadow" width="50" />
                                Hi, {{ Auth::user()->first_name }} <i class="fas fa-caret-down ms-1"></i>
                            </a>
                            @if (Auth::user()->roles === 'USER')
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('info-booking') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('info-pengerjaan') }}">History</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account-customer') }}">My Account</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                                </ul>
                            @else
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="{{ route('account-admin') }}">Setings</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a></li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                    {{-- <ul class=" navbar-nav">
                        <li class=" nav-item">
                            
                        </li>
                    </ul> --}}
                @endauth
                @guest
                    <a href="{{ route('register') }}" class="btn btn-cte-auth me-3" type="submit">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-cte" style="padding: 7px 32px;" type="submit">Login</a>
                @endguest
            </div>
        </div>
    </nav>
</div>
