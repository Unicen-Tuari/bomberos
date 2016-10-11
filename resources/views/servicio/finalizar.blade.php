@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      Finalizar servicio
    </div>
  <div class="panel-body">

  {!! Form::open([ 'route' => ['servicio.finalizar', $servicio->id], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

      <div class="form-group {{ $errors->has('bomberos') ? ' has-error' : '' }}">
        {!! Form::label('bomberos', 'Bomberos involucrados',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('Bomberos[]', $bomberos,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('bomberos'))
              <span class="help-block">
                  <strong>{{ $errors->first('bomberos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Vehiculos involucrados',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('Vehiculos[]', $vehiculos,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('vehiculos'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="form-group accidentados">
        <div class="col-sm-2 col-md-offset-3 {{ $errors->has('ilesos') ? ' has-error' : '' }}">
          {!! Form::label('ilesos', 'Ilesos',['class' => 'col-md-6 col-md-offset-1 col-form-label']) !!}
          <div class="col-md-5">
              {!! Form::text('ilesos', 0, ['class' => 'form-control']) !!}

              @if ($errors->has('ilesos'))
                  <span class="help-block">
                      <strong>{{ $errors->first('ilesos') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="col-sm-2 {{ $errors->has('lesionados') ? ' has-error' : '' }}">
          {!! Form::label('lesionados', 'Lesionados',['class' => 'col-md-5 col-md-offset-1 col-form-label']) !!}
          <div class="col-md-5">
              {!! Form::text('lesionados', 0, ['class' => 'form-control']) !!}

              @if ($errors->has('lesionados'))
                  <span class="help-block">
                      <strong>{{ $errors->first('lesionados') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="col-sm-2 {{ $errors->has('quemados') ? ' has-error' : '' }}">
          {!! Form::label('quemados', 'Quemados',['class' => 'col-md-5 col-md-offset-1 col-form-label']) !!}
          <div class="col-md-5">
              {!! Form::text('quemados', 0, ['class' => 'form-control']) !!}

              @if ($errors->has('quemados'))
                  <span class="help-block">
                      <strong>{{ $errors->first('quemados') }}</strong>
                  </span>
              @endif
          </div>
        </div>

      </div>

      <div class="form-group accidentados">
        <div class="col-sm-2 col-sm-offset-3 {{ $errors->has('muertos') ? ' has-error' : '' }}">
          {!! Form::label('muertos', 'Muertos',['class' => 'col-md-6 col-md-offset-1 col-form-label']) !!}
          <div class="col-md-5">
              {!! Form::text('muertos', 0, ['class' => 'form-control']) !!}

              @if ($errors->has('muertos'))
                  <span class="help-block">
                      <strong>{{ $errors->first('muertos') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="col-sm-2 {{ $errors->has('otros') ? ' has-error' : '' }}">
          {!! Form::label('otros', 'Otros',['class' => 'col-md-5 col-md-offset-1 col-form-label']) !!}
          <div class="col-md-5">
              {!! Form::text('otros', 0, ['class' => 'form-control']) !!}

              @if ($errors->has('otros'))
                  <span class="help-block">
                      <strong>{{ $errors->first('otros') }}</strong>
                  </span>
              @endif
          </div>
        </div>

      </div>

      <div class="form-group {{ $errors->has('combustible') ? ' has-error' : '' }}">
        {!! Form::label('combustible', 'Combustible',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('combustible', null, ['class' => 'form-control']) !!}

            @if ($errors->has('combustible'))
                <span class="help-block">
                    <strong>{{ $errors->first('combustible') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('reconocimiento') ? ' has-error' : '' }}">
        {!! Form::label('reconocimiento', 'Reconocimiento',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('reconocimiento', null, ['class' => 'form-control' , 'rows' => '8']) !!}

            @if ($errors->has('reconocimiento'))
                <span class="help-block">
                    <strong>{{ $errors->first('reconocimiento') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="form-group {{ $errors->has('disposiciones') ? ' has-error' : '' }}">
        {!! Form::label('disposiciones', 'Disposiciones',['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-6">
          {!! Form::textarea('disposiciones', null, ['class' => 'form-control', 'rows' => '4']) !!}

          @if ($errors->has('disposiciones'))
              <span class="help-block">
                  <strong>{{ $errors->first('disposiciones') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="form-group">

        @if(!$servicio->hora_salida)
          <div class="{{ $errors->has('salida') ? ' has-error' : '' }}">
            {!! Form::label('salida', 'Hora salida',['class' => 'col-sm-4 control-label']) !!}
            <div class="col-sm-2">
                {!! Form::date('salida', \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$servicio->hora_alarma)->addSeconds(30)->toDateTimeString(),['class' => 'form-control']) !!}

              @if ($errors->has('salida'))
                  <span class="help-block">
                      <strong>{{ $errors->first('salida') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="{{ $errors->has('regreso') ? ' has-error' : '' }}">
            {!! Form::label('regreso', 'Hora regreso',['class' => 'col-sm-1 control-label']) !!}
        @else
          <div class="{{ $errors->has('regreso') ? ' has-error' : '' }}">
            {!! Form::label('regreso', 'Hora regreso',['class' => 'col-sm-4 control-label']) !!}

        @endif
            <div class="col-sm-2">
              {!! Form::date('regreso', \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->toDateTimeString(),['class' => 'form-control']) !!}

              @if ($errors->has('regreso'))
                  <span class="help-block">
                      <strong>{{ $errors->first('regreso') }}</strong>
                  </span>
              @endif
            </div>
          </div>

      </div>

      <div class="col-sm-6 col-sm-offset-4">
        {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
        <button type="submit" class="btn btn-primary">
            <i class="glyphicon glyphicon-ok"></i> Finalizar
        </button>
      </div>

  {!! Form::close() !!}

    </div>
  </div>
</article>

@endsection
