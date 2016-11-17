<div class="row">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    LamCar
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (isset(Session::get('user')->id))
                <ul class="nav navbar-nav">
                    <li><a href="/admin/orders">Orders</a></li>
                    <li><a href="/admin/cars">Cars</a></li>
                    <li><a href="/admin/drivers">Drivers</a></li>
                    <li><a href="{{ url('/admin/get-business-hour') }}">Business Hour</a></li>
                </ul>
                @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if (isset(Session::get('user')->id))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Session::get('user')->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
