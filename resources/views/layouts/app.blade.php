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
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-multiselect.css') !!}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    {!! Html::style('assets/css/bomberos.css') !!}

    {!! Html::style('assets/css/home.css') !!}

</head>
<body id="app-layout">

    <nav class="navbar navbar-default navbar-static-top">
      <ul class="col-md-2 col-xs-4">
        <h2>Bomberos</h2>
        <h4>Trenque Lauquen</h4>
      </ul>
      <div class="col-md-10  col-xs-8 rightnav">
        @if (!Auth::guest())
          <ul class="nav navbar-nav">
              <li id="first-icon" class="navIcon odd"><a href="{{route('servicio.create')}}" title="Cargar llamada">
                  <span class="cantidad"></span> <span class="glyphicon glyphicon-phone-alt"></span> <span class="icon-title">Llamada</span></a></li>

              <li class="dropdown navIcon">
                <a class="dropdown-toggle" href="#" title="Servicios activos" data-toggle="dropdown">
                  {{-- <span class="cantidad">{{count(App\servicio::getActivos())}}</span> <span class="glyphicon glyphicon-fire"></span> <span class="icon-title">Activos</span></a> --}}
                <ul class="dropdown-menu">
                  {{-- @foreach( App\servicio::getActivos() as $servicio)
                    <li><a href="{{route('servicio.mostrar', $servicio->id)}}">{{$servicio->direccion}}</a>
                      @if(!$servicio->hora_salida)
                      {{ Form::open(['route' => ['servicio.salida',$servicio->id], 'method' => 'PUT']) }}
                        <button type="submit" class="btn fa fa-bus salida"></button>
                      {{ Form::close() }}
                      @else
                        <button type="submit" class="btn fa fa-bus salidaok"></button>
                      @endif
                    </li>
                  @endforeach --}}
                </ul>
              </li>

              <li class="navIcon odd"><a href="{{route('servicio.index')}}" title="Cargar servicio finalizado">
                <span class="cantidad"></span> <span class="glyphicon glyphicon-file"></span> <span class="icon-title">Finalizar</span>
              </a></li>
              <li class="navIcon"><a href="{{route('servicio.index')}}" title="Ultimos servicios realizados">
                <span class="cantidad"></span> <span class="glyphicon glyphicon-list"></span> <span class="icon-title">Últimos</span></a></li>
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
    </nav>

    @if (!Auth::guest())
      <div class="col-md-2  col-xs-4 sidebar">
        <div class="nav-side-menu">
          <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

          <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">

              <a href="#">
                <li data-toggle="collapse" data-target="#bombero" class="collapsed">
                <i class="fa fa-user fa-lg"></i> Bomberos<span class="arrow"></span>
                </li>
              </a>
              <ul class="sub-menu collapse" id="bombero">
                <a href="{{route('bombero.index')}}"><li>Lista de bomberos</li></a>
                  <a href="{{route('bombero.create')}}"><li>Registrar bombero</li></a>
              </ul>

              <a href="#">
                <li>
                <i class="fa fa-users fa-lg"></i> Asistencia
                </li>
              </a>


              <a href="#">
                <li data-toggle="collapse" data-target="#servicio" class="active collapsed">
                <i class="fa fa-cog fa-lg"></i> Servicio <span class="arrow"></span>
                </li>
              </a>
              <ul class="sub-menu collapse" id="servicio">
                <a href="{{route('servicio.tipo.index')}}"><li class="active">Tipo de servicio</li></a>
                <a href="{{route('servicio.index')}}"><li>Lista de servicio</li></a>
              </ul>


              <a href="{{route('vehiculos.index')}}">
                <li>
                <i class="fa fa-car fa-lg"></i> Vehiculos
                </li>
              </a>

              <a href="{{route('materiales.index')}}">
                <li>
                <i class="fa fa-wrench fa-lg"></i> Materiales
                </li>
              </a>
            </ul>
          </div>
        </div>
      </div>
      <div class="right-panel col-md-10  col-xs-8">
    @else
      <div class="right-panel col-md-12">
    @endif
        @yield('content')
      </div>
    {!!HTML::script('assets/js/jquery.js')!!}
    {!!HTML::script('assets/js/bootstrap.js')!!}
    {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
    <!-- JavaScripts -->
</body>
</html>
