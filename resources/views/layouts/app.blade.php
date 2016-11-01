<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Bomberos voluntarios</title>
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

    <nav>
      <div class="col-lg-2 col-sm-4 col-xs-12 text-center">
        <h2>Bomberos</h2>
        <h4>Trenque Lauquen</h4>
      </div>
      <div class="col-lg-10 col-sm-8 col-xs-12">
        @if (!Auth::guest())
          <ul class="col-xs-10">
              <li id="first-icon" class="navIcon odd text-center">
                <a href="{{route('servicio.llamada')}}" title="Cargar llamada">
                  <p><span class="glyphicon glyphicon-phone-alt"></span></p><p><span>Llamada</span><p>
                </a>
              </li>

              <li class="dropdown navIcon text-center">
                <a class="dropdown-toggle" href="#" title="Servicios activos" data-toggle="dropdown">
                  <span class="cantidad">{{count(App\Servicio::getActivos())}}</span><p><span class="glyphicon glyphicon-fire"></span></p><p><span class="icon-title">Activos</span></p>
                </a>
                <ul class="dropdown-menu serviciosActivos">
                  @foreach( App\Servicio::getActivos() as $servicio)
                    <li>
                      <a href="{{route('servicio.finalizarActivo', $servicio->id)}}">{{$servicio->direccion}}
                        @if(!$servicio->hora_salida)
                          {{ Form::open(['route' => ['servicio.salida',$servicio->id], 'method' => 'PUT']) }}
                            <button type="submit" class="btn fa fa-bus salida" title="Cargar hora de salida"></button>
                          {{ Form::close() }}
                        @else
                          <button type="submit" class="btn fa fa-bus salidaok"></button>
                        @endif
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>

              <li class="navIcon odd text-center">
                <a href="{{route('servicio.create')}}" title="Cargar servicio finalizado">
                  <p><span class="glyphicon glyphicon-file"></span></p><p><span class="icon-title">Cargar servicio</span></p>
                </a>
              </li>

              <li class="navIcon text-center">
                <a href="{{route('servicio.index')}}" title="Ultimos servicios realizados">
                  <p><span class="glyphicon glyphicon-list"></span></p><p><span class="icon-title">Últimos</span></p>
                </a>
              </li>
          </ul>
        @endif

            @if (Auth::guest())
            <!-- Right Side Of Navbar -->
            <ul class="col-xs-12 rightNav">
                <div class="col-xs-11">

                </div>
                <!-- Authentication Links -->
                <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                <li><a href="{{ url('/register') }}">Registrarse</a></li>
            @else
            <!-- Right Side Of Navbar -->
            <ul class="col-xs-2 rightNav">
                <div class="col-xs-3">

                </div>
                <!-- Authentication Links -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->nombre }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
                    </ul>
                </li>
            @endif
        </ul>
      </div>
    </nav>

    @if (!Auth::guest())

      <div id="MainMenu" class="col-lg-2 col-xs-4">
        <div class="list-group panel">

          <a href="#bomberosSubMenu" id="bomberoMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-user fa-lg"></i> Bomberos<span class="arrow"></span></a>
          <div class="collapse" id="bomberosSubMenu">
            <a href="{{route('bombero.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Listar bomberos</a>
            <a href="{{route('bombero.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta bombero</a>
          </div>

          <a href="#asistenciasSubMenu" id="asistenciaMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-users fa-lg"></i> Asistencia<span class="arrow"></span></a>
          <div class="collapse" id="asistenciasSubMenu">
            <a href="" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Asistencia?</a>
            <a  href="{{route('asistencia.puntuacion')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Puntuacion?</a>
          </div>

          <a href="#serviciosSubMenu" id="servicioMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-cog fa-lg"></i>  Servicios<span class="arrow"></span></a>
          <div class="collapse" id="serviciosSubMenu">
            <a href="{{route('servicio.tipo.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Tipos de servicios</a>
            <a href="{{route('servicio.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Últimos servicios</a>
            <a href="{{route('servicio.estadistica')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Estadísticas</a>
          </div>

          <a href="#vehiculosSubMenu" id="vehiculoMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-car fa-lg"></i> Vehículos<span class="arrow"></span></a>
          <div class="collapse" id="vehiculosSubMenu">
            <a href="{{route('vehiculo.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de vehículos</a>
            <a href="{{route('vehiculo.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta vehículo</a>
          </div>

          <a href="#materialesSubMenu" id="materialMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-wrench fa-lg"></i> Materiales<span class="arrow"></span></a>
          <div class="collapse" id="materialesSubMenu">
            <a href="{{route('material.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de materiales</a>
            <a href="{{route('material.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta material</a>
          </div>
        </div>

      </div>
      <div class="right-panel col-lg-10 col-xs-8">
    @else
      <div class="col-sm-12">
    @endif
        @yield('content')
      </div>
    {!!HTML::script('assets/js/jquery.js')!!}
    {!!HTML::script('assets/js/bootstrap.js')!!}
    {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
    {!!HTML::script('assets/js/script.js')!!}
    @yield('js')
    <!-- JavaScripts -->
</body>
</html>
