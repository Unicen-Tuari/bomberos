<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    {!! Html::style('assets/css/lato.css') !!}
    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}"> --}}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-multiselect.css') !!}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    {!! Html::style('assets/css/bomberos.css') !!}

    {!! Html::style('assets/css/home.css') !!}

</head>
<body id="app-layout">

    <nav class="navbar navbar-default navbar-static-top home-navbar">
      <ul class="nav navbar-nav">
          <li><img id="logoNav" src="{{ url('assets/images/logo.png') }}" alt="Logo" /></li>
      </ul>
        <div class="container">

            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>



            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                @if (!Auth::guest())
                  <ul class="nav navbar-nav">
                      <li><a class="odd navIcon glyphicon glyphicon-phone-alt odd" href="{{ url('/servicio/create') }}" title="Cargar llamada"></a></li>
                      <li><a class="navIcon glyphicon glyphicon-fire" href="{{ url('/servicio') }}" title="Servicios activos"></a></li>
                      <li><a class="navIcon glyphicon glyphicon-file odd" href="{{ url('/servicio') }}" title="Cargar servicio finalizado"></a></li>
                      <li><a class="navIcon glyphicon glyphicon-list" href="{{ url('/servicio') }}" title="Ultimos servicios realizados"></a></li>
                  </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

      <div class="right-panel col-md-12">
        @yield('content')
      </div>
    {!!HTML::script('assets/js/jquery.js')!!}
    {!!HTML::script('assets/js/bootstrap.js')!!}
    {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
    <!-- JavaScripts -->
</body>
</html>
