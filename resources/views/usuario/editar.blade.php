@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar Usuario</h4>
    </div>
    <div class="panel-body">

      <form action="{{route('usuario.update',$usuario)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="nombre" > Nombre</label>
        <div class="col-md-6">
                    <input class="form-control" type="text" name="nombre" value="{{$usuario->nombre}}">
              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('apellido') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="apellido" >Apellido</label>
          <div class="col-md-6">
                    <input class="form-control" type="text" name="apellido" value="{{$usuario->apellido}}">
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

        <div class="form-group {{ $errors->has('activo') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="admin" > Administrador</label>
          <div class="col-md-6">
            <input type="checkbox" class="chkAdmin" name="admin" data-toggle="toggle" data-off="Usuario" data-on="Administrador" data-onstyle="success" data-offstyle="danger" placeholder= "Admin"
              @if ($usuario->admin =="on")
                checked
              @endif
            >
              @if ($errors->has('admin'))
                  <span class="help-block">
                      <strong>{{ $errors->first('admin') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-user">Guardar</i>
            </button>
          </div>
        </div>

    </div>
  </div>
</article>
@endsection
