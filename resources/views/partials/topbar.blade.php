<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    @if (Auth::user()->picture)
                        <img src="{{ asset('template/img/photos/' . Auth::user()->picture) }}"
                            alt="{{ Auth::user()->name }}" class="avatar img-fluid rounded me-1" />
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Placeholder picture"
                            class="img-fluid rounded-circle mb-2" alt="{{ Auth::user()->name }}" />
                    @endif
                    <span class="text-dark">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="align-middle me-1"
                            data-feather="user"></i> Profile</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Logout" class="dropdown-item">
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
