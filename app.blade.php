<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="ml-0 section-homepage section-@yield('class') mt-5">
  <div id="app">
    <nav class="navbar fixed-top navbar-expand-md navbar-light navbar-laravel bg-dark">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <offcanvas-home />
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li>
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li>
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
                <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="pt-5">
      @yield('content')
    </main>
  
  @yield('contentjs')
  <footer class="py-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md text-center">
          <a href="/">
            <img src="/images/d20-dark.png" alt="" width="75">
          </a>
          <small class="d-block mt-3 mb-3 text-muted">© 2017-2018</small>
        </div>
        <div class="col-6 col-md">
          <ul class="nav flex-column">
            <li class="nav-item"><a href="/">Home</a></li>
            <li class="nav-item"><a href="/about">About Us</a></li>
            <li class="nav-item"><a href="/contact">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <ul class="nav flex-column">
            <li class="nav-item"><a href="/documentation">Documentation</a></li>
            <li class="nav-item"><a href="/login">Login</a></li>
            <li class="nav-item"><a href="/register">Signup</a></li>
          </ul>
        </div>
      </div>
      <p class="text-center"><small>RP Admin was made by <a href="https://www.iamtimsmith.com">Tim Smith</a></small></p>
    </div>
  </footer>
</div>
</body>

</html>