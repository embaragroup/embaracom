    <!-- Header -->
    <div class="sub-header">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xs-12">
              <ul class="left-info">
                <li><a href="#"><i class="fa fa-envelope"></i>groupembara@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-phone"></i>+628994407084</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <ul class="right-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <header class="">
        <nav class="navbar navbar-expand-lg">
          <div class="container">
            <a class="navbar-brand" href="index.html"><h2>Embara <em>.com</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('home')">
                  <a class="nav-link" href="{{url('/home')}}">Home</a>
                </li>
                <li class="nav-item dropdown @yield('destinasi')">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Trip Wisata</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/destinasi')}}">Semua Destinasi Trip</a>
                        <a class="dropdown-item" href="testimonials.html">Kategori Destinasi Trip</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tiket dan Lainnya</a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="about.html">Tiket Pesawat</a>
                        <a class="dropdown-item" href="testimonials.html">Transport</a>
                        <a class="dropdown-item" href="testimonials.html">Hotel</a>
                        <a class="dropdown-item" href="testimonials.html">Tour Guide</a>
                    </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="packages.html">Tentang Kami</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->first_name}}</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="about.html">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
            @endauth
              </ul>
            </div>
          </div>
        </nav>
      </header>
