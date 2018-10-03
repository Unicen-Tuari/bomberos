@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar bombero</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['bombero.update', $bombero ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('nombre', $bombero->nombre, ['class' => 'form-control']) !!}

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
              {!! Form::text('apellido', $bombero->apellido, ['class' => 'form-control']) !!}

              @if ($errors->has('apellido'))
                  <span class="help-block">
                      <strong>{{ $errors->first('apellido') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('cuartel') ? ' has-error' : '' }}">
          {!! Form::label('cuartel', 'Código de cuartel',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {!! Form::text('cuartel', $bombero->cuartel, ['class' => 'form-control']) !!}

              @if ($errors->has('cuartel'))
                  <span class="help-block">
                      <strong>{{ $errors->first('cuartel') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('legajo') ? ' has-error' : '' }}">
          {!! Form::label('legajo', 'Código de legajo',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {!! Form::text('legajo', $bombero->legajo, ['class' => 'form-control']) !!}

              @if ($errors->has('legajo'))
                  <span class="help-block">
                      <strong>{{ $errors->first('legajo') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('jerarquia') ? ' has-error' : '' }}">
          {!! Form::label('jerarquia', 'Jerarquía',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {{Form::select('jerarquia', [1 => 'Oficial Superior',2 => 'Oficial Jefe',3 => 'Oficial Subalterno',4 => 'Suboficial Superior',5 => 'Suboficial Subalterno',6 => 'Bombero',7 => 'Cadete',8 => 'Aspirante'],$bombero->jerarquia, ['class' => 'form-control'])}}

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
          {!! Form::text('direccion', $bombero->direccion, ['class' => 'form-control']) !!}

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
          {!! Form::text('telefono', $bombero->telefono, ['class' => 'form-control']) !!}

              @if ($errors->has('telefono'))
                  <span class="help-block">
                      <strong>{{ $errors->first('telefono') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
          {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
          {!! Form::text('fecha_nacimiento', \Carbon\Carbon::parse($bombero->fecha_nacimiento)->format('d/m/Y'), ['class' => 'form-control']) !!}

              @if ($errors->has('fecha_nacimiento'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('activo') ? ' has-error' : '' }}">
          {!! Form::label('activo', "Activo", ['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::checkbox('activo', 1,$bombero->activo, ['data-toggle' => "toggle", 'data-onstyle'=>"success", 'data-on' => 'Sí', 'data-off' => 'No']) !!}

              @if ($errors->has('activo'))
                  <span class="help-block">
                      <strong>{{ $errors->first('activo') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-user"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
