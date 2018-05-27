<?php 
use App\User;

$user_id = auth()->user()->id;
$user = User::find($user_id);
?>
<header id="topnav">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <offcanvas-left class="d-md-none"></offcanvas-left>
            </div>
            <div class="col-6">
                <ul class="text-right">
                    <!-- Authentication Links -->
                    @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else

                    <dropdown text="{{ Auth::user()->name }}">
                        <li><a class="dropdown-item" href="/settings/{{ $user_id }}">Settings</a></li>
                        <div class="dropdown-divider mb-0 mt-0"></div>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </dropdown>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</header>