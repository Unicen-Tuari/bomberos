@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Alta de material
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'material.store', 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true]) !!}


          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group">
            {!! Form::label('vehiculo_id', 'Esta en el vehiculo: ',['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-2">
              {{Form::select('vehiculo_id', $vehiculos,null,['class' => 'form-control'])}}
            </div>
              @if ($errors->has('vehiculo_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('vehiculo_id') }}</strong>
                  </span>
              @endif
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
</article>
@endsection
