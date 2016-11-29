@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Inicio Alerta
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'servicio.iniciado', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        <div hidden>
          {!! Form::text('finalizado', 'falso', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group {{ $errors->has('num_servicio') ? ' has-error' : '' }}">
          {!! Form::label('num_servicio', 'Nº servicio',['class' => 'col-sm-8 control-label']) !!}
          <div class="col-sm-2">
              {!! Form::text('num_servicio', null, ['class' => 'form-control']) !!}

              @if ($errors->has('num_servicio'))
                  <span class="help-block">
                      <strong>{{ $errors->first('num_servicio') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('Tipo', 'Tipo de servicio',['class' => 'col-md-2 col-md-offset-2 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('tipo', $tipos,null,['class' => 'form-control'])}}
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
              {!! Form::textarea('autor_llamada', null, ['class' => 'form-control', 'rows' => 2]) !!}

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
            {!! Form::text('alarma', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString(),['class' => 'form-control']) !!}

            @if ($errors->has('alarma'))
                <span class="help-block">
                    <strong>{{ $errors->first('alarma') }}</strong>
                </span>
            @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
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
