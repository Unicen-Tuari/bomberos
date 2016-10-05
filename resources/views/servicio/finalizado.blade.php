@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Finalizar servicio
    </div>
  <div class="panel-body">

  {!! Form::open([ 'route' => 'servicio.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

    <div class="form-group {{ $errors->has('tipo') ? ' has-error' : '' }}">
      {!! Form::label('tipo', 'Tipo de servicio',['class' => 'col-sm-2 col-sm-offset-2 control-label']) !!}
      <div class="col-sm-2">
        {{Form::select('tipo', $tipos,null,['class' => 'form-control'])}}

        @if ($errors->has('tipo'))
            <span class="help-block">
                <strong>{{ $errors->first('tipo') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
      {!! Form::label('direccion', 'Direccion',['class' => 'col-sm-4 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

          @if ($errors->has('direccion'))
              <span class="help-block">
                  <strong>{{ $errors->first('direccion') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
      {!! Form::label('descripcion', 'Descripcion',['class' => 'col-sm-4 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 2]) !!}

          @if ($errors->has('descripcion'))
              <span class="help-block">
                  <strong>{{ $errors->first('descripcion') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group">
      <div class="{{ $errors->has('bomberos') ? ' has-error' : '' }}">
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

      <div class="{{ $errors->has('vehiculos') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Vehiculos involucrados',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('Vehiculos[]', $vehiculos,null,['class' => 'selectMultiple', 'multiple'=>'multiple'])}}
          @if ($errors->has('vehiculos'))
              <span class="help-block">
                  <strong>{{ $errors->first('vehiculos') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group accidentados">
      <div class="col-md-2 col-md-offset-3 {{ $errors->has('ilesos') ? ' has-error' : '' }}">
        {!! Form::label('ilesos', 'Ilesos',['class' => 'col-md-3 col-md-offset-5 col-form-label']) !!}
        <div class="col-md-3">
            {!! Form::text('ilesos', 0, ['class' => 'form-control']) !!}

            @if ($errors->has('ilesos'))
                <span class="help-block">
                    <strong>{{ $errors->first('ilesos') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="col-md-2 {{ $errors->has('lesionados') ? ' has-error' : '' }}">
        {!! Form::label('lesionados', 'Lesionados',['class' => 'col-md-4 col-md-offset-2 col-form-label']) !!}
        <div class="col-md-3">
            {!! Form::text('lesionados', 0, ['class' => 'form-control']) !!}

            @if ($errors->has('lesionados'))
                <span class="help-block">
                    <strong>{{ $errors->first('lesionados') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="col-md-1 {{ $errors->has('quemados') ? ' has-error' : '' }}">
        {!! Form::label('quemados', 'Quemados',['class' => 'col-md-7 col-form-label']) !!}
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
      <div class="col-md-2 col-md-offset-3 {{ $errors->has('muertos') ? ' has-error' : '' }}">
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

      <div class="col-md-1 {{ $errors->has('otros') ? ' has-error' : '' }}">
        {!! Form::label('otros', 'Otros',['class' => 'col-md-4 col-md-offset-2 col-form-label']) !!}
        <div class="col-md-6">
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
          {!! Form::textarea('reconocimiento', null, ['class' => 'form-control' , 'rows' => '6']) !!}

          @if ($errors->has('reconocimiento'))
              <span class="help-block">
                  <strong>{{ $errors->first('reconocimiento') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
      {!! Form::label('descripcion', 'Descripcion',['class' => 'col-sm-4 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '6']) !!}

        @if ($errors->has('descripcion'))
            <span class="help-block">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('alarma') ? ' has-error' : '' }}">
      {!! Form::label('alarma', 'Hora alarma',['class' => 'col-sm-4 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::date('alarma', \Carbon\Carbon::now()->toDateTimeString(),['class' => 'form-control']) !!}

        @if ($errors->has('alarma'))
            <span class="help-block">
                <strong>{{ $errors->first('alarma') }}</strong>
            </span>
        @endif
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
