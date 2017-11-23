@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-user" aria-hidden="true"></span>
      <h4>Alta Usuario</h4>
    </div>
    <div class="panel-body">

      <form class="form-horizontal" action={{route("usuario.store")}} method="POST">
        {{csrf_field()}}
        {{method_field('POST')}}
        <div hidden>
          <input type="checkbox" name="activo" value="1">
      </div>

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="nombre" > Nombre</label>
          <div class="col-md-6">
            <input class="form-control" type="text" name="nombre" placeholder= "Nombre">
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
                <input class="form-control" type="text" name="apellido" placeholder= "Apellido">
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
                <input class="form-control" type="text" name="usuario" placeholder= "Usuario">
                    @if ($errors->has('usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usuario') }}</strong>
                        </span>
                    @endif
              </div>
        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="password" > Password</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="password" placeholder= "Password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
        </div>

        <div class="form-group {{ $errors->has('activo') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="admin" > Administrador</label>
          <div class="col-md-6">
              <input type="checkbox" class="form-control" type="text" checked data-toggle="toggle" data-off="No" data-on="Sí" data-onstyle="success" placeholder= "Admin">
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
