@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-id-badge" aria-hidden="true"></span>
      <h4>Permisos de usuarios</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'bombero.permisosupdate', 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

        <div class="form-group">
          <div class="col-md-12 control-label">
            {!! Form::label('usuario', "Nombre y Apellido / Usuario",['class' => 'col-md-7 control-label']) !!}
          </div>
          @foreach($usuarios as $usuario)
            <div class="col-lg-6 col-md-12 control-label">
              {!! Form::label('usuario',$usuario->nombre.' '.$usuario->apellido." / ".$usuario->usuario,['class' => 'col-lg-7 col-md-5 control-label']) !!}
              <div class="col-sm-4">
                {!! Form::checkbox('usuario-'.$usuario->id, 1,$usuario->admin, ['data-toggle' => "toggle", 'data-onstyle'=>"success", 'data-offstyle'=>"danger", 'data-on' => 'Administrador', 'data-off' => 'Usuario']) !!}
              </div>
            </div>
          @endforeach
        </div>

        <div class="form-group col-sm-7">
            <button type="submit" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-bell"></i> Finalizar
            </button>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
