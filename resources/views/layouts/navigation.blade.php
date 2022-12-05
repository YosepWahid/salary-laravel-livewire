<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="iconify" data-icon="akar-icons:money"></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    @can('View Chartpie Salary')
                        <a href="{{ route('home') }}" class="nav-link text-muted text-decoration">Dashboard</a>
                    @elsecan('View Super Chartpie Salary')
                        <a href="{{ route('home') }}" class="nav-link text-muted text-decoration">Dashboard</a>
                    @endcan
                </li>

                <li class="nav-item dropdown">
                    @can('View All Salary')
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Salary
                        </a>
                    @elsecan('View User Salary')
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Salary
                        </a>
                    @endcan

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @can('View All Salary')
                            <a class="dropdown-item" href="{{ Route('view.salary') }}">
                                All Salary
                            </a>
                        @endcan

                        @can('View User Salary')
                            <a class="dropdown-item" href="{{ Route('view.userSalary') }}">
                                User Salary
                            </a>
                        @endcan
                    </div>
                </li>

                <li class="nav-item dropdown">
                    @can('View User')
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Management
                        </a>
                    @elsecan('View Role')
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Management
                        </a>
                    @elsecan('View Permission')
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Management
                        </a>
                    @endcan

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @can('View User')
                            <a class="dropdown-item" href="{{ Route('view.user') }}">
                                User
                            </a>
                        @endcan

                        @can('View Role')
                            <a class="dropdown-item" href="{{ Route('view.role') }}">
                                Role
                            </a>
                        @endcan

                        @can('View Permission')
                            <a class="dropdown-item" href="{{ Route('view.permission') }}">
                                Permission
                            </a>
                        @endcan
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
