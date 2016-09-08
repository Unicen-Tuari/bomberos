@extends('layouts.app')

@section('content')
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">
    Alta de vehiculo
  </div>
  <div class="panel-body">
    {!! Form::open([ 'route' => 'vehiculos.store', 'class' => 'form-horizontal', 'method' => 'POST', 'files' => true]) !!}


        {!! Form::label('patente', 'Patente',['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('patente', null, ['class' => 'form-control']) !!}

            @if ($errors->has('patente'))
                <span class="help-block">
                    <strong>{{ $errors->first('patente') }}</strong>
                </span>
            @endif
        </div>
      {{-- </div> --}}

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
