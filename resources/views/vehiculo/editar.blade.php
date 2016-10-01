@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Editar vehiculo
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['vehiculo.update', $vehiculo ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        {!! Form::label('patente', 'Patente',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('patente', $vehiculo->patente, ['class' => 'form-control']) !!}

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
