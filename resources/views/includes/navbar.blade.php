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
            <a class="nav-link active" href="{{ route('home') }}"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('shops') }}">Shops</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success px-5 text-white" href="{{ route('login') }}"
              >Sign In</a
            >
          </li>
        </ul>
      </div>
    </div>
</nav>