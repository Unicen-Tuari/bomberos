@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Usuario N° {{$usuario->id}}
    </div>
    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label" name="nombre" > Nombre</label>
      <div class="col-md-6">
                    <input class="form-control" type="text" name="usuario" value="{{$usuario->nombre}}">
          @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('apellido') ? ' has-error' : '' }}">

      <label class="col-md-4 control-label" name="apellido" > Apellido</label>
      <div class="col-md-6">
            <input class="form-control" type="text" name="usuario" value="{{$usuario->apellido}}">
          @if ($errors->has('apellido'))
              <span class="help-block">
                  <strong>{{ $errors->first('apellido') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('usuario') ? ' has-error' : '' }}">

      <label class="col-md-4 control-label" name="usuario" > Usuario</label>
      <div class="col-md-6">
            <input class="form-control" type="text" name="usuario" value="{{$usuario->usuario}}">
          @if ($errors->has('usuario'))
              <span class="help-block">
                  <strong>{{ $errors->first('usuario') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('admin') ? ' has-error' : '' }}">

      <label class="col-md-4 control-label" name="admin" > Administrador</label>
      <div class="col-md-6">
          {!! Form::hidden('admin', '0') !!}
          {!! Form::checkbox('admin', 1, $usuario->admin, ['data-toggle' => "toggle", 'data-onstyle'=>"success", 'data-on' => 'Sí', 'data-off' => 'No']) !!}

          @if ($errors->has('admin'))
              <span class="help-block">
                  <strong>{{ $errors->first('admin') }}</strong>
              </span>
          @endif
      </div>
    </div>

  </div>
</article>
@endsection
