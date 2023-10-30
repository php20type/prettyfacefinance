<header class="site-header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-3">
            <a class="navbar-brand" href="/"><img src="{{ asset('new_css/img/logo/logo.png') }}" alt="logo" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/practioner-information">Practitioner Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clinics">Shop & Apply </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/finance">Finance</a>
                    </li>

                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" dropdown-bs-toggle data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="/equipment-finance">Equipment Finance</a>-->
                        
                    <!--</li>-->
                    
                    
                        
                       <li class="nav-item dropdown">
                          <a class="nav-link" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            Equipment
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/equipment-finance">Equipment finance</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/catalogue">Machines</a></li>
                          </ul>
                        </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">FAQ </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact </a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a href="/clinics/request" class="nav-link">Clinic Sign Up</a>
                        </li>

                        <li class="nav-item d-lg-none">
                            <a href="/login" class="nav-link">Clinic Login</a>
                        </li>
                    @endguest
                    @auth
                        @if (Auth::user()->role != 1)
                            <li class="nav-item d-lg-none">
                                <a href="{{ action('ClinicController@edit', Auth::user()->clinic_id) }}"
                                    class="nav-link">Clinic Admin</a>
                            </li>
                        @else
                            <li class="nav-item d-lg-none">
                                <a class="nav-link" href="/admin">Super Admin</a>
                            </li>
                        @endif
                        <li class="nav-item d-lg-none">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>

                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    @endauth
                </ul>


                <div class="btn-group justify-content-end d-none d-lg-flex" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-user dropdown-bs-toggle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Clinic Login</a>
                        @endguest
                        @auth
                            @if (Auth::user()->role != 1)
                                <a href="{{ action('ClinicController@edit', Auth::user()->clinic_id) }}"
                                    class="dropdown-item">Clinic Admin</a>
                            @else
                                <a class="dropdown-item" href="/admin">Super Admin</a>
                            @endif

                            <div class="dropdown-divider"></div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>

                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">
                                Logout
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="basket d-none d-lg-flex flex">
                    <div class="p-3">
                        <i class="fa fa-shopping-basket"></i>
                    </div>
                    <div class="d-flex align-items-end flex-wrap">
                        <a href="/basket" class="text-center">
                            <small class="count">{{ Cart::count() }} Items</small>
                            <small class="price">£{{ Cart::subtotal() }}</small>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</header>
