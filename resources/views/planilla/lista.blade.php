@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-sticky-note" aria-hidden="true"></span>
      <h4>Planillas</h4>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Jefe Guardia</th>
            <th>Nro Guardia</th>
            <th>Inicio Semana</th>
            <th>Fin Semana</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Detalles</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($planillas as $planilla)
          <td>{{$planilla->jefe_guardia}}</td>
          <td>{{$planilla->nro_guardia}}</td>
          <td>{{$planilla->inicio_semana}}</td>
          <td>{{$planilla->fin_semana}}</td>
          <td>{{$planilla->mes}}</td>
          <td>{{$planilla->year}}</td>
          <td><a href="{{ route('renglon.index', $planilla->id) }}" class="glyphicon glyphicon-plus"></a></td>
          @if (Auth::user()->admin)
          <td><a href="{{ route('planilla.edit', $planilla->id) }}" class="glyphicon glyphicon-edit"></a></td>
          <td>
              <form action="{{route('planilla.destroy',$planilla)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="glyphicon glyphicon-trash"></button>
              </form>
          </td>
          @else
            <td colspan="2">
              <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
            </td>
          @endif
          <td><a href="{{ route('planilla.mostrar', $planilla->id) }}" class="glyphicon glyphicon-picture"></a></td>
        </tr>
        @endforeach
      </tbody>
      <br>
    </table>
  </div>
</div>
</article>
@endsection
