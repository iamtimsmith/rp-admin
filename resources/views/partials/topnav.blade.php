<header id="topnav">
  <div class="container">
  <div class="row">
    <div class="col-sm">
      <input type="text" placeholder="Search...">
    </div>
    <div class="col-sm">
        <ul class="text-right">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else

            <dropdown text="{{ Auth::user()->name }}">
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a></li>
                 <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                 </li>
            </dropdown>
                {{--<li class="nav-item dropdown">
                    <a href="javascript:void(0)" @click="dropdownToggle">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <dropdown>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </dropdown>--}}
                </li>
            @endguest
        </ul>
    </div>
  </div>
</div>
</header>