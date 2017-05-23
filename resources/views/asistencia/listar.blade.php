@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-calendar" aria-hidden="true"></span>
      <h4>Reuniones realizadas</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Fechas de Reuniones</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($reuniones as $key => $asistencias)
            <tr>
              <td class="text-center"><a href="{{ route('asistencia.show', $key) }}">{{\Carbon\Carbon::parse($key)->format('d-m-Y')}}</a></td>
              @if (Auth::user()->admin)
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('asistencia.edit', $key) }}"></a></td>
              @else
                <td class="text-center">
                  <button type="submit" class="btn glyphicon glyphicon-ban-circle ban" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2" class="text-center">reuniones</td>
          </tr>
        </tfoot>
        </table>
    </div>
  </div>
</article>
@endsection
