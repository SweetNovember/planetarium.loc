<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Planetarium</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.css')}}" rel="stylesheet">

</head>
<body>
<div id="app">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->

                <a class="navbar-brand" href="{{ url('/') }}">
                    Planetarium
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                {{--@guest--}}
                <ul class="nav navbar-nav">
                    &nbsp;<li><a href="{{route('indexEvent')}}">Events</a></li>
                    {{--@else--}}
                    <li><a href="{{ route('indexNews') }}">
                            Forum
                        </a></li>
                    <li><a href="{{ url('news/readXML') }}">
                            RRS
                        </a></li>
                </ul>
            {{--@endguest--}}
            <!-- Right Side Of Navbar -->
                <div class="container-fluid">

                </div>


                <ul class="nav navbar-nav navbar-right">
                    <div class="container-fluid">

                    </div>
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else

                        {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"--}}
                        {{--aria-expanded="true" aria-haspopup="true">--}}
                        {{--{{ Auth::user()->name }}--}}
                        {{--<span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu">--}}
                        {{--<li>--}}


                        <li><a href="{{url('/home')}}">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--</li>--}}
                        @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
{{--
</script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
</body>
</html>
