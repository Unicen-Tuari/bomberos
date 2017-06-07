<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Bomberos voluntarios</title>
    {!! Html::style('assets/css/lato.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-multiselect.css') !!}
    {!! Html::style('assets/css/bomberos.css') !!}
    {!! Html::style('assets/css/home.css') !!}
</head>

<body id="app-layout">
    <nav>

      <div id="titleHome" class="col-md-2 col-sm-4 hidden-xs hidden-sm">
        <a href="{{route('home.index')}}">
          <h2>Bomberos</h2>
          <h4>Trenque Lauquen</h4>
        </a>
      </div>

      <div class="col-md-10 col-sm-12 col-xs-12">
        @if (!Auth::guest())
          <ul class="col-xs-10">
            @if (Auth::user()->admin)
              <li id="first-icon" class="navIcon odd text-center">
                <a href="{{route('servicio.llamada')}}" title="Cargar llamada">
                  <p><span class="glyphicon glyphicon-phone-alt"></span></p><p><span>Llamada</span><p>
                </a>
              </li>

              <li class="dropdown navIcon text-center">
                <a class="dropdown-toggle" href="#" title="Servicios activos" data-toggle="dropdown">
                  <span class="cantidad">{{count(App\Servicio::getActivos())}}</span><p><span class="glyphicon glyphicon-fire"></span></p><p><span class="icon-title">Activos</span></p>
                </a>

                @if(App\Servicio::getActivos() != null)
                <ul class="dropdown-menu serviciosActivos">
                      @foreach(App\Servicio::getActivos() as $servicio)
                        <li>
                          <a href="{{route('servicio.finalizarActivo', $servicio->id)}}">{{$servicio->direccion}}
                            @if(!$servicio->hora_salida)
                              {{ Form::open(['route' => ['servicio.salida',$servicio->id], 'method' => 'PUT']) }}
                                <button type="submit" class="btn fa fa-minus salida" title="Cargar hora de salida"></button>
                              {{ Form::close() }}
                            @else
                              <button type="submit" class="btn fa fa-check salidaok"></button>
                            @endif
                          </a>
                        </li>
                      @endforeach
                </ul>
                @endif
              </li>

              <li class="navIcon odd text-center">
                <a href="{{route('servicio.create')}}" title="Cargar servicio finalizado">
                  <p><span class="glyphicon glyphicon-file"></span></p><p><span class="icon-title">Cargar servicio</span></p>
                </a>
              </li>

              <li class="navIcon text-center">
            @else
              <li id="first-icon"  class="navIcon text-center">
            @endif
                <a href="{{route('servicio.index')}}" title="Ultimos servicios realizados">
                  <p><span class="glyphicon glyphicon-list"></span></p><p><span class="icon-title">Últimos</span></p>
                </a>
              </li>
          </ul>
        @endif

        @if (Auth::guest())
        <ul class="pull-right col-xs-2 rightNav">
            <!-- Authentication Links -->
            <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
            <li><a href="{{ url('/register') }}">Registrarse</a></li>
        @else
        <ul class="col-xs-2 rightNav">
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
      <div id="MainMenu" class="col-sm-2 col-xs-12">
        <div class="list-group panel">

          <a href="#bomberosSubMenu" id="bomberoMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-user fa-lg" style="padding-right: 10px;"></i> Bomberos<span class="arrow"></span></a>
          <div class="collapse" id="bomberosSubMenu">
            <a href="{{route('bombero.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Listar bomberos</a>
            @if (Auth::user()->admin)
              <a href="{{route('bombero.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta bombero</a>
            @endif
          </div>

          <a href="#asistenciasSubMenu" id="asistenciaMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-users fa-lg" style="padding-right: 10px;"></i> Asistencia<span class="arrow"></span></a>
          <div class="collapse" id="asistenciasSubMenu">
            @if (Auth::user()->admin)
              <a href="{{route('asistencia.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Cargar</a>
            @endif
            <a  href="{{route('asistencia.index')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de reuniones</a>
            <a  href="{{route('ingreso.listar')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de ingresados</a>
          </div>

          <a href="#puntuacionSubMenu" id="puntuacionMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-calendar fa-lg" style="padding-right: 10px;"></i> Puntuacion<span class="arrow"></span></a>
          <div class="collapse" id="puntuacionSubMenu">
            @if (Auth::user()->admin)
              <a  href="{{route('puntuacion.create')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Cargar</a>
            @endif
            <a  href="{{route('puntuacion.index')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Listar</a>
            <a  href="{{route('puntuacion.anual')}}"  class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Listado anual</a>
          </div>

          <a href="#serviciosSubMenu" id="servicioMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-cog fa-lg" style="padding-right: 10px;"></i>  Servicios<span class="arrow"></span></a>
          <div class="collapse" id="serviciosSubMenu">
            <a href="{{route('servicio.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Últimos servicios</a>
            <a href="{{route('servicio.estadistica')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Estadísticas</a>
          </div>

          <a href="#vehiculosSubMenu" id="vehiculoMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-car fa-lg" style="padding-right: 10px;"></i> Vehículos<span class="arrow"></span></a>
          <div class="collapse" id="vehiculosSubMenu">
            <a href="{{route('vehiculo.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de vehículos</a>
            @if (Auth::user()->admin)
              <a href="{{route('vehiculo.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta vehículo</a>
            @endif
          </div>

          <a href="#materialesSubMenu" id="materialMenu" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-wrench fa-lg" style="padding-right: 10px;"></i> Materiales<span class="arrow"></span></a>
          <div class="collapse" id="materialesSubMenu">
            <a href="{{route('material.index')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Lista de materiales</a>
            @if (Auth::user()->admin)
              <a href="{{route('material.create')}}" class="list-group-item"><i class="fa fa-angle-double-right fa-md"></i> Alta material</a>
            @endif
          </div>
        </div>

        <div id="regIngreso" class="col-sm-2 col-xs-12">
          <div class="">
            {{Form::select('Bomberos', App\Bombero::getBomberos(), null,['class' => 'col-sm-2 selectMultiple', 'id' => 'bomberoIngreso'])}}
            @if ($errors->has('Bomberos'))
                <span class="help-block">
                    <strong>{{ $errors->first('Bomberos') }}</strong>
                </span>
            @endif
          </div>
          <button class="fa fa-sign-in" type="button" title="Registrar ingreso" id="ingresar" name="button"></button>
          <p>Entrar</p>
          {{Form::open(['route' => ['ingreso.guardarIngreso'], 'method' => 'POST', 'id' => 'form-ingresar'])}}
            <div hidden>
              {!! Form::text('id_bombero', ':USER_ID', ['class' => 'form-control','id' => 'ingresado']) !!}
            </div>
          {{Form::close()}}
          {{Form::open(['route' => ['ingreso.borrarIngreso', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete'])}}
            <button class="fa fa-sign-out" type="button" title="Registrar egreso" id="egresar" name="button"></button>
            <p>Salir</p>
          {{Form::close()}}
        </div>
      </div>
      <div class="right-panel col-sm-10 col-xs-12">
    @else
      <div class="row">
    @endif
      @yield('content')
    </div>
      {!!HTML::script('assets/js/jquery.js')!!}
      {!!HTML::script('assets/js/bootstrap.js')!!}
      {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
      {!!HTML::script('assets/js/script.js')!!}
      {!!HTML::script('assets/js/ajaxIngreso.js')!!}
    @yield('js')
    <!-- JavaScripts -->
</body>
</html>
