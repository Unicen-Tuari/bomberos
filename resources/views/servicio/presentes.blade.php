@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      Presentes
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => 'servicio.guardar_presentes', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

        @foreach($ingresados as $key => $bombero)
          <div class="col-sm-6 control-label {{ $errors->has('asistencia-'.$key) ? ' has-error' : '' }}">
            {!! Form::label('bombero-'.$key, $bombero,['class' => 'col-sm-5 col-sm-offset-1 control-label']) !!}
            <div class="col-sm-4">
              {{Form::select('asistencia-'.$key, [1 => 'Guardia',2 => 'En primera dotacion',3 => 'En otra dotacion',4 => 'En el cuartel',5 => 'En comision',6 => 'Licenciado',7 => 'Enfermo',8 => 'Cumpliendo castigo',9 => 'Con aviso',10 => 'Sin aviso'],5,['class' => 'form-control'])}}

              @if ($errors->has('asistencia-'.$key))
                  <span class="help-block">
                      <strong>{{ $errors->first('asistencia-'.$key) }}</strong>
                  </span>
              @endif
            </div>
          </div>
        @endforeach
        <div>

        </div>
        <div class="form-group">
          <div class="col-md-3 col-md-offset-6">
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-bell"></i> Finalizar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
