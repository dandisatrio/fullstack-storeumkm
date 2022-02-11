<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @stack('prepend-styles')
    @include('includes.styles-auth')
    @stack('addon-styles')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <nav
        class="main-header navbar navbar-dashboard navbar-expand-lg navbar-light"
        >
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                ><i class="fas fa-bars"></i
            ></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav d-none d-lg-flex ml-auto">
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
                <a class="dropdown-item" href="{{ route('home') }}">Home</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>
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
        <ul class="navbar-nav d-flex flex-row d-lg-none ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="#"> Hi, User </a>
            </li>
            <li class="nav-item">
            <a class="nav-link d-inline-block" href="{{ route('home') }}"> Home </a>
            </li>
            <li class="nav-item">
            <a class="nav-link d-inline-block" href="{{ route('cart') }}"> Cart </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
        </ul>
      </nav>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-5 pb-3 mb-5 d-flex"></div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : ''}}">
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard-transaction') }}" class="nav-link {{ (request()->is('dashboard/transactions*')) ? 'active' : ''}}">
                  <p>Transactions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dashboard-account') }}" class="nav-link {{ (request()->is('dashboard/account*')) ? 'active' : ''}}">
                  <p>My Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link" >
                  Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      @yield('content')

      <footer class="main-footer">
        2022 Copyright Store UMKM Negeri Katon. All Rights Reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>

    
    @include('includes.scripts-auth')
    @stack('prepend-scripts')
    @stack('addon-scripts')
  </body>
</html>
