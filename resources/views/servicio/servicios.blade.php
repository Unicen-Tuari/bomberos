@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-list" aria-hidden="true"></span>
      <h4>Ultimos servicios realizados</h4>
    </div>

    <div class="col-sm-12">
      <div class="col-md-10 col-sm-12 text-right" style="padding-top: 20px;">
        {{Form::model(Request::all(),['route' => 'servicio.index', 'class' => 'form-horizontal', 'method' => 'GET'])}}
          <div class="col-sm-3">
            {{Form::select('tipo_s',[0=>'Tipo de Servicio'] + config('selects.tipoServicio'),null, ['class' => 'form-control'])}}
          </div>
          <div class="col-sm-3">
            {{Form::select('tipo_a', [''=>'Tipo de Alarma'] + config('selects.tipoAlarma'),null, ['class' => 'form-control'])}}
          </div>
          <div class="col-sm-2">
            {{Form::select('mes', [0=>"MES"] + config('selects.meses'),null, ['class' => 'form-control','id' => 'mes'])}}
          </div>
          <div class="col-sm-2">
            {{Form::text('año', null, ['placeholder'=>\Carbon\Carbon::now()->format('Y'), 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-1">
            {{Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
          </div>
        {{Form::close()}}
      </div>
    </div>

    <div class="panel-body">
      <table  class="table table-bordered">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Tipo de servicio</th>
            <th class="text-center">Direccion</th>
            <th class="text-center">Hora de regreso</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($servicios as $servicio)
            @if ($servicio->hora_regreso)
              <tr>
                <td class="text-center"><a href="{{route('servicio.show', $servicio->id)}}">{{config('selects.tipoServicio')[$servicio->tipo_servicio_id]}}</a></td>
                <td class="text-center">{{$servicio->direccion}}</td>
                <td class="text-center">{{\Carbon\Carbon::parse($servicio->hora_regreso)->format('d/m/Y H:i:s')}}</td>
                @if (Auth::user()->admin)
                  <td class="text-center">
                    {{ Form::open(['route' => ['servicio.destroy', $servicio->id], 'method' => 'delete']) }}
                        <button type="submit" class="glyphicon glyphicon-trash"></button>
                    {{ Form::close() }}
                  </td>
                  <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('servicio.edit', $servicio->id) }}"></a></td>
                @else
                  <td class="text-center" colspan="2">
                    <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                  </td>
                @endif
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
      @if (!$ultimos)
        <div class="text-center">
          {{ $servicios->appends(Request::all())->render()}}
        </div>
      @endif
    </div>
  </div>
</article>
@endsection
