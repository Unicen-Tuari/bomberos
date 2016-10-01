@extends('layouts.app')

@section('content')
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Finalizar servicio
    </div>
  <div class="panel-body">

  {!! Form::open([ 'route' => 'servicio.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

    <div class="form-group">
      {!! Form::label('Tipo', 'Tipo de servicio',['class' => 'col-md-2 col-md-offset-2 control-label']) !!}
      <div class="col-md-2">
        {{Form::select('Tipo', $tipos,null,['class' => 'form-control'])}}
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

    <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
      {!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
          {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 2]) !!}

          @if ($errors->has('descripcion'))
              <span class="help-block">
                  <strong>{{ $errors->first('descripcion') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group">
      <div class="{{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('bomberos', 'Bomberos involucrados',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-2">
          {{Form::select('Bomberos[]', $bomberos,null,['multiple'=>'multiple'])}}
          @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('vehiculos', 'Vehiculos involucrados',['class' => 'col-md-2 control-label']) !!}
        <div class="col-md-2">
          {{Form::select('Vehiculos[]', $vehiculos,null,['multiple'=>'multiple'])}}
          @if ($errors->has('nombre'))
              <span class="help-block">
                  <strong>{{ $errors->first('nombre') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-3 col-md-offset-3 {{ $errors->has('direccion') ? ' has-error' : '' }}">
        {!! Form::label('direccion', 'Direccion',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-2">
            {!! Form::text('direccion', null, ['class' => 'form-control']) !!}

            @if ($errors->has('direccion'))
                <span class="help-block">
                    <strong>{{ $errors->first('direccion') }}</strong>
                </span>
            @endif
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
      {!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
      <div class="col-md-6">
        {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-6 col-md-offset-4">
      {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
      <button type="submit" class="btn btn-primary">
          <i class="glyphicon glyphicon-ok"></i> Finalizar
      </button>
    </div>

  {!! Form::close() !!}

    </div>
  </div>
</div>

  <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('assets/js/dropdown.js') }}"></script>
@endsection
