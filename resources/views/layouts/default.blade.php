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
    <link href="{{ asset('css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
</head>
<body>
<!-- Header -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PL
                <i class="fab fa-autoprefixer"></i>
                NET<i class="fab fa-autoprefixer"></i>
                RIUM</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">About</a></li>
                <li><a href="#">History</a></li>
                <li><a href="{{route('indexEvent')}}">Events</a></li>
                <li><a href="{{ route('indexNews') }}">News</a></li>
                {{--<li><a href="#">--}}
                        {{--<i class="far fa-envelope" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="true" aria-haspopup="true">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/home')}}"><i class="fas fa-home"></i> My Page</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-in-alt"></i> Sign out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</div>
{{--<div id="headerwrap">--}}
{{--<div class="container">--}}
{{--<div class="row centered">--}}
{{--<div class="col-lg-8 col-lg-offset-2">--}}
{{--<h1>Познай космос с нами!</h1>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="container w">--}}
{{--<div class="row centered">--}}
{{--<br><br>--}}
{{--<div class="col-lg-4">--}}
{{--<i class="fa fa-heart"></i>--}}
{{--<h4>Design</h4>--}}
{{--<p>Duis mattis at orci et aliquam. Suspendisse potenti.--}}
{{--Ut vulputate tortor at orci auctor, et tempus nibh feugiat.--}}
{{--Morbi accumsan id nibh vel sagittis. Ut a volutpat enim.--}}
{{--Nulla porttitor non est eget rutrum.--}}
{{--Maecenas ut ipsum tristique, dapibus mauris eu,--}}
{{--scelerisque nunc.</p>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<i class="fa fa-laptop"></i>--}}
{{--<h4>PC</h4>--}}
{{--<p>Duis mattis at orci et aliquam. Suspendisse potenti.--}}
{{--Ut vulputate tortor at orci auctor, et tempus nibh feugiat.--}}
{{--Morbi accumsan id nibh vel sagittis. Ut a volutpat enim.--}}
{{--Nulla porttitor non est eget rutrum.--}}
{{--Maecenas ut ipsum tristique, dapibus mauris eu,--}}
{{--scelerisque nunc.</p>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<i class="fa fa-trophy"></i>--}}
{{--<h4>Help</h4>--}}
{{--<p>Duis mattis at orci et aliquam. Suspendisse potenti.--}}
{{--Ut vulputate tortor at orci auctor, et tempus nibh feugiat.--}}
{{--Morbi accumsan id nibh vel sagittis. Ut a volutpat enim.--}}
{{--Nulla porttitor non est eget rutrum.--}}
{{--Maecenas ut ipsum tristique, dapibus mauris eu,--}}
{{--scelerisque nunc.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br><br>--}}
{{--</div>--}}
{{--<div id="dg">--}}
{{--<div class="container">--}}
{{--<div class="row centered">--}}
{{--<h4>Last Works</h4>--}}
{{--<br>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="tilt">--}}
{{--<a href="#">--}}
{{--<img src="../img/01.jpg" alt="">--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="tilt">--}}
{{--<a href="#">--}}
{{--<img src="../img/02.jpg" alt="">--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-4">--}}
{{--<div class="tilt">--}}
{{--<a href="#">--}}
{{--<img src="../img/03.jpg" alt="">--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br><br>--}}
{{--</div>--}}
<!-- Content -->
<div class="container wb">
    {{--<div class="">--}}
    <br><br>
    @yield('content')
    {{--<div class="col-lg-8 col-lg-offset-2">--}}
    {{--<h4>We create sites</h4>--}}
    {{--<p>Duis mattis at orci et aliquam. Suspendisse potenti.--}}
    {{--Ut vulputate tortor at orci auctor, et tempus nibh feugiat.--}}
    {{--Morbi accumsan id nibh vel sagittis. Ut a volutpat enim.--}}
    {{--Nulla porttitor non est eget rutrum.--}}
    {{--Maecenas ut ipsum tristique, dapibus mauris eu,--}}
    {{--scelerisque nunc.</p>--}}
    {{--</div>--}}
    {{--<div class="col-lg-2">--}}
    {{--<div class="col-lg-10 col-lg-offset-1">--}}
    {{--<img src="../img/03.jpg" alt="" class="img-responsive">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
</div>
{{--<div id="lg">--}}
{{--<div class="container">--}}
{{--<div class="row centered">--}}
{{--<h4>Partners</h4>--}}
{{--<div class="col-lg-2 col-lg-offset-1">--}}
{{--<img src="../img/belastro.gif" alt="">--}}
{{--</div>--}}
{{--<div class="col-lg-2">--}}
{{--<img src="../img/sm.gif" alt="">--}}
{{--</div>--}}
{{--<div class="col-lg-2">--}}
{{--<img src="../img/apr.jpg" alt="">--}}
{{--</div>--}}
{{--<div class="col-lg-2">--}}
{{--<img src="../img/crp.jpg" alt="">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div id="b">--}}
{{--<div class="container">--}}
{{--<div class="row centered">--}}
{{--<div class="col-lg-8 col-lg-offset-2">--}}
{{--<h4>Development Web-sites</h4>--}}
{{--<p>Duis mattis at orci et aliquam. Suspendisse potenti.--}}
{{--Ut vulputate tortor at orci auctor, et tempus nibh feugiat.--}}
{{--Morbi accumsan id nibh vel sagittis. Ut a volutpat enim.--}}
{{--Nulla porttitor non est eget rutrum.--}}
{{--Maecenas ut ipsum tristique, dapibus mauris eu,--}}
{{--scelerisque nunc.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<!-- Footer -->
<div id="f">
    <div class="container">
        <div class="row centered">
            <a href="https://chats.viber.com/minskplanetarium/ru"><i class="fab fa-viber"></i> </a>
            <a href="https://www.facebook.com/planetarium.by/"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/planetarium_by/"><i class="fab fa-instagram"></i> </a>
            <a href="https://vk.com/planetarium_by"><i class="fab fa-vk"></i> </a>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>