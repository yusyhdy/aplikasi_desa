
<nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Aplikasi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @if (!Auth::check())
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
          </li>

        </ul>
      </div>

        <a href="{{ route('signup') }}" class="btn btn-outline-light mx-2">Sign Up</a>
        <a href="{{ route('signin') }}" class="btn btn-outline-light">Signin</a>
        @else
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('users') }}">Data Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">Data Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('posts') }}">Data POSTS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}">Data Surat</a>
              </li>

            </ul>
          </div>
        <a href="{{ route('logout') }}" class="btn btn-outline-light">Logout</a>
    @endif
      </div>
    </div>
  </nav>
