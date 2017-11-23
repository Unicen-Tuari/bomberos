@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar Usuario</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['usuario.update', $usuario ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}
      <!-- <form action="{{route('usuario.update',$usuario)}}" method="put">
        {{ csrf_field() }}
        {{ method_field('UPDATE') }} -->
        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="nombre" > Nombre</label>
        <div class="col-md-6">
              {!! Form::text('nombre', $usuario->nombre, ['class' => 'form-control']) !!}
              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('apellido') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="nombre" >Apellido</label>
          <div class="col-md-6">
              {!! Form::text('apellido', $usuario->apellido, ['class' => 'form-control']) !!}

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
          {!! Form::text('usuario', $usuario->usuario, ['class' => 'form-control']) !!}

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

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
