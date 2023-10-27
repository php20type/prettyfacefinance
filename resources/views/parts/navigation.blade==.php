<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="/" style="
    width: 180px;
">
            <img src="https://www.cosmeticfinancegroup.co.uk/img/logo.png" alt="" style="
    width: 100%;
    padding: 1rem 0 1rem 0;
">
        </a>

        <div class="mobile-basket">
            <div class="basket d-flex flex">
                <div class="p-2">
                    <i class="fa fa-shopping-basket"></i>
                </div>
                <div class="text-center">
                    <div>
                        <small class="count">0 Items</small>
                    </div>
                    <div>
                        <small class="price">£0.00</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-center  text-uppercase">
                <li class="nav-item col-auto active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item col-auto">
                    <a class="nav-link" href="/practioner-information">Practitioner Info</a>
                </li>
                <li class="nav-item col-auto">
                    <a class="nav-link" href="/clinics">Shop & Apply</a>
                </li>
                <li class="nav-item col-auto">
                    <a class="nav-link" href="/finance">Finance</a>
                </li>
                <li class="nav-item col-auto">
                    <a class="nav-link" href="/faq">FAQ</a>
                </li>
                <li class="nav-item col-auto">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <!--<li class="nav-item col-auto d-block d-lg-none d-xl-none">
                        <a href="/clinics/request" class="nav-link" style="color: #b39960;">Clinic Sign Up</a>
                    </li>-->

                @guest
                <li class="nav-item col-auto">
                    <a href="/clinics/request" class="nav-link" style="color: #b39960;">Clinic Sign Up</a>
                </li>

                <li class="nav-item col-auto d-block d-lg-none">
                    <a href="/login" class="nav-link">Clinic Login</a>
                </li>
                @endguest
                @auth
                @if(Auth::user()->role != 1)
                <li class="nav-item col-auto d-block d-lg-none">
                    <a href="{{action('ClinicController@edit', Auth::user()->clinic_id)}}" class="nav-link">Clinic Admin</a>
                </li>
                @else
                <li class="nav-item col-auto d-block d-lg-none">
                    <a class="nav-link" href="/admin">Super Admin</a>
                </li>
                @endif
                <li class="nav-item col-auto d-block d-lg-none">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>

                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
                @endauth
            </ul>

            <div class="btn-group justify-content-end d-none d-lg-flex" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </button>

                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    @guest
                    <a class="dropdown-item" href="{{route('login')}}">Clinic Login</a>
                    @endguest
                    @auth
                    @if(Auth::user()->role != 1)
                    <a href="{{action('ClinicController@edit', Auth::user()->clinic_id)}}" class="dropdown-item">Clinic Admin</a>
                    @else
                    <a class="dropdown-item" href="/admin">Super Admin</a>
                    @endif

                    <div class="dropdown-divider"></div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>

                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
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
                        <small class="count">{{Cart::count()}} Items</small>
                        <small class="price">£{{Cart::subtotal()}}</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>