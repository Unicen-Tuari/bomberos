@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-calendar" aria-hidden="true"></span>
      <h4>Reuniones realizadas</h4>
    </div>
    <div class="panel-body">
      {{Form::model(Request::all(),['route' => 'AsistenciaController.rango', 'class' => 'form-horizontal', 'method' => 'GET'])}}
      <div class="form-group">
        <div class="col-sm-6 col-md-4 {{ $errors->has('inicio') ? ' has-error' : '' }}">
          {!! Form::label('fecha_reunion', 'Buscar desde:',['class' => 'col-sm-6 control-label']) !!}
          <div class="col-sm-6">
            @if (count($reuniones)!=0)
            {!! Form::text('inicio',null,
            ['class' => 'form-control','placeholder'=>\Carbon\Carbon::parse($reuniones[0]->fecha_reunion )->format('d/m/Y')]) !!}
            @else
              {!! Form::text('inicio', null,['class' => 'form-control','placeholder'=>\Carbon\Carbon::now()->format('d/m/Y')]) !!}
            @endif

            @if ($errors->has('inicio'))
                <span class="help-block">
                    <strong>{{ $errors->first('inicio') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="col-sm-6 col-md-4 {{ $errors->has('fin') ? ' has-error' : '' }}">
          {!! Form::label('fecha_reunion', 'hasta:',['class' => 'col-sm-6 control-label']) !!}
          <div class="col-sm-6">
            {!! Form::text('fin',null,['class' => 'form-control','placeholder'=>\Carbon\Carbon::now()->format('d/m/Y')]) !!}

              @if ($errors->has('fin'))
                  <span class="help-block">
                      <strong>{{ $errors->first('fin') }}</strong>
                  </span>
              @endif
          </div>
        </div>
        <div class="col-sm-1">
          {{Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
        </div>
      </div>
      {{Form::close()}}
      <div class="form-group form-horizontal">
        @foreach ($reuniones as $key => $asistencias)
          <div class="form-group col-sm-6">
            <div class="col-sm-8 text-center">
              <a href="{{ route('asistencia.show', $asistencias->fecha_reunion) }}">Reunión del {{\Carbon\Carbon::parse($asistencias->fecha_reunion)->format('d/m/Y')}}</a>
            </div>
            <div class="col-sm-4 text-center">
              @if (Auth::user()->admin)
                <div class="col-sm-3 col-sm-offset-2">
                  <a class="glyphicon glyphicon-edit" href="{{ route('asistencia.edit', $asistencias->fecha_reunion) }}"></a>
                </div>
                <div class="col-sm-3">
                  {{ Form::open(['route' => ['asistencia.destroy', $asistencias->fecha_reunion], 'method' => 'DELETE']) }}
                      <button type="submit" class="glyphicon glyphicon-trash"></button>
                  {{ Form::close() }}
                </div>
              @else
                <a class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</article>
@endsection

