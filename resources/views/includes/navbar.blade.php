<nav class="navbar navbar-store navbar-expand-lg navbar-light py-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">UMKM Negeri Katon </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : ''}}" href="{{ route('home') }}"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('shop*')) ? 'active' : ''}}" href="{{ route('shops') }}">Shops</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('categories*')) ? 'active' : ''}}" href="{{ route('categories') }}">Category</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success px-5 text-white" href="{{ route('login') }}"
              >Sign In</a
            >
          </li>
          @endguest
        </ul>

        @auth
        <!-- Desktop Menu -->
        <ul class="navbar-nav d-none d-lg-flex">
          <li class="nav-item dropdown">
            <a
              class="nav-link"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                alt=""
                class="rounded-circle mr-2 profile-picture"
              />
              Hi, {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
              <a class="dropdown-item" href="{{ route('dashboard-account') }}"
                >Settings</a
              >
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link d-inline-block mt-2" href="{{ route('cart') }}">
              @php
                $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
              @endphp
              @if ($carts > 0)
                <img src="/assets/images/icon-cart-filled.svg" alt="" />
                <div class="cart-badge">{{ $carts }}</div>
              @else
                <img src="/assets/images/icon-cart-empty.svg" alt="" />
              @endif
              
            </a>
          </li>
        </ul>

        <!-- Mobile Menu -->
        <ul class="navbar-nav d-block d-lg-none">
          <li class="nav-item">
            <a class="nav-link" href="#">
              Hi, User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-inline-block" href="#">
              Cart
            </a>
          </li>
          <li class="nav-item">              
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
        @endauth
      </div>
    </div>
</nav>