<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/welcome') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav navbar-left">

            </ul>
            <ul class="navbar-nav">
                @if (Auth::user())
                <li class="nav-item">
                    <a class="navbar-brand" href="/">Home</a>
                </li>
                @endif
                 <li class="nav-item">
                    <a class="navbar-brand" href="/cars">cars</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="/about">About</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <ul class="navbar-nav navbar-right">


                    <li class="nav-item">
                        <h4 class="nav-link" >
                            {{ Auth::user()->name }}
                        </h4>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" style="color: white",>
                             {{ __('Logout') }}
                        </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                    </li>
                </ul>
                @endguest
            </ul>
        </div>
    </div>
</nav>
