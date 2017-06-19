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
        {{Form::model(Request::all(),['route' => 'bombero.index', 'class' => 'form-horizontal', 'method' => 'GET'])}}
          <div class="col-sm-3">
            {{Form::select('jerarquia', [0=>'Jerarquia'] + config('selects.jerarquia'),0, ['class' => 'form-control'])}}
          </div>
          <div class="col-sm-4">
            {{Form::text('nombre', null, ['placeholder'=>"Apellido/Nombre", 'class' => 'form-control'])}}
          </div>
          <div class="col-sm-4">
            {{Form::text('legajo', null, ['placeholder'=>"Nº legajo", 'class' => 'form-control'])}}
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
            <th></th>
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
                <td><a href="{{ route('bombero.edit', $bombero->id) }}" class="glyphicon glyphicon-edit"></a></td>
                <td>
                  @if (count($bombero->servicios)==0)
                    {{ Form::open(['route' => ['bombero.destroy', $bombero->id], 'method' => 'DELETE']) }}
                        <button type="submit" class="glyphicon glyphicon-trash"></button>
                    {{ Form::close() }}
                  @else
                    <button type="submit" class="glyphicon glyphicon-ban-circle" title="Imposible eliminar, participo en al menos un servicio"></button>

                  @endif
                </td>
              @else
                <td colspan="2">
                  <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <br>
        </table>
        <div class="text-center">
          {{ $bomberos->appends(Request::all())->links()}}
        </div>
    </div>
  </div>
</article>
@endsection

@section('js')
  {{ Html::script('assets/js/ajaxpuntuacion.js') }}
@endsection
