@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Bomberos</h4>
    </div>

    <div class="col-sm-12">
      <div class="col-md-7 col-sm-12 text-right" style="padding-top: 20px;">
        @php
          $jerarquias[0]="Jerarquia";
          $jerarquias=array_merge($jerarquias, config('selects.jerarquia'));
        @endphp
        {{Form::model(Request::all(),['route' => 'bombero.index', 'class' => 'form-horizontal', 'method' => 'GET'])}}
          <div class="col-sm-3">
            {{Form::select('jerarquia', $jerarquias,0, ['class' => 'form-control'])}}
          </div>
          <div class="col-sm-4">
            {{Form::text('nombre', null, ['placeholder'=>"Buscar por Apellido/Nombre", 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-4">
            {{Form::text('legajo', null, ['placeholder'=>"Buscar por legajo", 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-1">
            {{Form::submit('Buscar', ['class' => 'btn btn-primary']) }}
          </div>
        {{Form::close()}}
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th>Numero Legajo</th>
            <th>Jerarquia</th>
            <th>Apellido, nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Fecha nacimiento</th>
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($bomberos as $bombero)
            @if ($bombero->activo)
            <tr>
            @else
            <tr class="danger">
            @endif
              <td>{{$bombero->nro_legajo}}</td>
              <td>{{config('selects.jerarquia')[$bombero->jerarquia]}}</td>
              <td class="filtro">{{$bombero->apellido}}, {{$bombero->nombre}}</td>
              <td>{{$bombero->direccion}}</td>
              <td>{{$bombero->telefono}}</td>
              <td>{{\Carbon\Carbon::parse($bombero->fecha_nacimiento)->format('d/m/Y')}}</td>
              @if (Auth::user()->admin)
                <td><a href="{{ route('bombero.edit', $bombero->id) }}"><button class="glyphicon glyphicon-edit"></button></a></td>
                <td>
                  {{ Form::open(['route' => ['bombero.destroy', $bombero->id], 'method' => 'DELETE']) }}
                      <button type="submit" class="glyphicon glyphicon-trash"></button>
                  {{ Form::close() }}
                </td>
              @else
                <td colspan="2">
                  <button type="submit" class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <br>
        </table>
        <div class="text-center">
          {{ $bomberos->appends(Request::only(['legajo']))->links()}}
        </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {{ Html::script('assets/js/ajaxpuntuacion.js') }}
@endsection
