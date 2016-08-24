@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    Formulario de alta bombero
  </div>
  <div class="panel-body">
    {!! Form::open([ 'class' => 'form-horizontal', 'url' => 'alta', 'method' => 'POST', 'files' => true]) !!}
      {{ csrf_field() }} {{-- Crea todo el campo TOKEN falsificación de petición en sitios cruzados --}}

      <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

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
            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}

            @if ($errors->has('apellido'))
                <span class="help-block">
                    <strong>{{ $errors->first('apellido') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('nro_legajo') ? ' has-error' : '' }}">
        {!! Form::label('nro_legajo', 'Numero de legajo',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('nro_legajo', null, ['class' => 'form-control']) !!}

            @if ($errors->has('nro_legajo'))
                <span class="help-block">
                    <strong>{{ $errors->first('nro_legajo') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('jerarquia') ? ' has-error' : '' }}">
        {!! Form::label('jerarquia', 'Jerarquía',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('jerarquia', null, ['class' => 'form-control']) !!}

            @if ($errors->has('jerarquia'))
                <span class="help-block">
                    <strong>{{ $errors->first('jerarquia') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
        {!! Form::label('direccion', 'Dirección',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

            @if ($errors->has('direccion'))
                <span class="help-block">
                    <strong>{{ $errors->first('direccion') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
        {!! Form::label('telefono', 'Teléfono',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}

            @if ($errors->has('telefono'))
                <span class="help-block">
                    <strong>{{ $errors->first('telefono') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('fechan') ? ' has-error' : '' }}">
        {!! Form::label('fechan', 'Fecha de nacimiento',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
        {!! Form::text('fechan', 'dia/mes/año', ['class' => 'form-control']) !!}

            @if ($errors->has('fechan'))
                <span class="help-block">
                    <strong>{{ $errors->first('fechan') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
          <button type="submit" class="btn btn-primary">
              <i class=" glyphicon glyphicon-user"></i> Registrar
          </button>
        </div>
      </div>

    {!! Form::close() !!}
  </div>
</div>
</div>
@endsection
