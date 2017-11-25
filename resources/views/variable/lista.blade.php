@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-pie-chart" aria-hidden="true"></span>
        <h4>Lista de variables</h4>
      </div>
      <div class="panel-body">
        <table class="table table-striped">
          <thead><!--Titulos de la tabla-->
            <tr>
              <th>Asistencia</th>
              <th>Accidentales</th>
              <th>Guardias</th>
              <th>Año</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($variables as $variable)
              <tr>
                <td>{{$variable->asistencia}}</td>
                <td>{{$variable->accidentales}}</td>
                <td>{{$variable->guardias}}</td>
                <td>{{$variable->anio}}</td>
                @if (Auth::user()->admin)
                  <td><a href="{{ route('variable.edit', $variable->id) }}" class="glyphicon glyphicon-edit"></a></td>
                  <td class="text-center">
                    <form class="form-horizontal" action={{route('variable.destroy', $variable->id)}} method="POST">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" class="glyphicon glyphicon-trash"></button>
                    </form>
                  </td>
                @else
                  <td colspan="2">
                    <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                  </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="text-center">
          {{ $variables->appends(Request::all())->links()}}
        </div>
      </div>
    </div>
  </article>
@endsection
