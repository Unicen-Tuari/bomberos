@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Bomberos</h4>
    </div>
    
    <div class="col-sm-offset-9 col-sm-3">
          <div class="text-right" style="padding-top: 20px;">
            {{Form::text('busqueda', null, ['placeholder'=>"Buscar por legajo", 'class' => 'form-control col-sm-3 inputFilter'])}}
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
        <tbody class="tableFilter"><!--Contenido de la tabla-->
          @php
            $jerarquias=[1 => 'Oficial Superior',2 => 'Oficial Jefe',3 => 'Oficial Subalterno',4 => 'Suboficial Superior',5 => 'Suboficial Subalterno',6 => 'Bombero',7 => 'Cadete',8 => 'Aspirante']
          @endphp
          @foreach ($bomberos as $bombero)
            @if ($bombero->activo)
            <tr>
            @else
            <tr class="danger">
            @endif
              <td class="filtro">{{$bombero->nro_legajo}}</td>
              <td>{{$jerarquias[$bombero->jerarquia]}}</td>
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
          {{ $bomberos->render()}}
        </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxpuntuacion.js') !!}
@endsection