@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Editar material
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['material.update', $material ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('nombre', $material->nombre, ['class' => 'form-control']) !!}

            @if ($errors->has('patente'))
                <span class="help-block">
                    <strong>{{ $errors->first('patente') }}</strong>
                </span>
            @endif
        </div>

        {!! Form::label('vehiculo_id', 'Esta en el vehiculo: ',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('vehiculo_id', $material->vehiculo_id, ['class' => 'form-control']) !!}

            @if ($errors->has('patente'))
                <span class="help-block">
                    <strong>{{ $errors->first('patente') }}</strong>
                </span>
            @endif
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
