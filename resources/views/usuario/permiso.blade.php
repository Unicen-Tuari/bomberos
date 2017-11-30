@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-id-badge" aria-hidden="true"></span>
      <h4>Permisos de usuarios</h4>
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action={{route("usuario.permisosupdate")}} method="PUT">
        <div class="form-group">
          <div class="col-md-12 control-label">
            <label class="col-md-7 control-label" name="usuario" > Nombre y Apellido / Usuario</label>
          </div>
          @foreach($usuarios as $usuario)
            <div class="col-lg-6 col-md-12 control-label">
              <label class="col-lg-7 col-md-5 control-label">  {{$usuario->nombre}} {{$usuario->apellido}}  / {{$usuario->usuario}} </label>
              <div class="col-sm-4">
                <input type="checkbox" name="usuario" class="toggle btn btn-success" @if ($usuario->admin) checked @endif data-toggle="toggle" data-off="Usuario" data-on="Administrador" data-onstyle="success" data-offstyle="danger">
              </div>
            </div>
          @endforeach
        </div>
        <div class="form-group col-sm-7">
            <button type="submit" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-bell"> Finalizar</i>
            </button>
        </div>

    </div>
  </div>
</article>
@endsection
