@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-phone" aria-hidden="true"></span>
      <h4>Cargar llamada</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'servicio.iniciado', 'class' => 'form-horizontal', 'method' => 'POST']) !!}


        {!! Form::hidden('finalizar', 0) !!}

        <div class="form-group">
          {!! Form::label('Tipo', 'Tipo de servicio',['class' => 'col-md-2 col-md-offset-2 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('tipo', config('selects.tipoServicio'),null,['class' => 'form-control'])}}
          </div>

          <div class="{{ $errors->has('tipo_alarma') ? ' has-error' : '' }}">
            {!! Form::label('tipo_alarma', 'Tipo alarma',['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-2">
              {{Form::select('tipo_alarma', config('selects.tipoAlarma'),null,['class' => 'form-control'])}}

              @if ($errors->has('tipo_alarma'))
                  <span class="help-block">
                      <strong>{{ $errors->first('tipo_alarma') }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>

        <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
          {!! Form::label('direccion', 'Direccion',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

              @if ($errors->has('direccion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('direccion') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('autor_llamada') ? ' has-error' : '' }}">
          {!! Form::label('autor_llamada', 'Autor llamada',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('autor_llamada', null, ['class' => 'form-control', 'rows' => 2]) !!}

              @if ($errors->has('autor_llamada'))
                  <span class="help-block">
                      <strong>{{ $errors->first('autor_llamada') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('alarma') ? ' has-error' : '' }}">
          {!! Form::label('alarma', 'Hora alarma',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-2">
            {!! Form::text('alarma', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->format('d/m/Y H:i:s'),['class' => 'form-control']) !!}

            @if ($errors->has('alarma'))
                <span class="help-block">
                    <strong>{{ $errors->first('alarma') }}</strong>
                </span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-bell"></i> Iniciar
            </button>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
