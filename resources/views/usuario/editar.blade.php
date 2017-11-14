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

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
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
          {!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
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
          {!! Form::label('usuario', 'Usuario',['class' => 'col-md-4 control-label']) !!}
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
          {!! Form::label('admin', "Administrador", ['class' => 'col-md-4 control-label']) !!}
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



        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-user"></i> Guardar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
