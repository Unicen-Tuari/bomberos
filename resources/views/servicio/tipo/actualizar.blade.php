@extends('layouts.app')

@section('content')
<aside class="container col-md-6">
  <div class="panel panel-default">
    <div class="panel-heading text-center">
      Modificar tipo de servicio
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['servicio.tipo.update', $tipo], 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('nombre', $tipo->nombre , ['class' => 'form-control']) !!}

              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-list-alt"></i> Actualizar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</aside>
@endsection
