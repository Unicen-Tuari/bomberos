@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-home" aria-hidden="true"></span>
        <h4>Inicio</h4>
      </div>
        <div class="panel-body">
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
    </div>
  </article>
@endsection
