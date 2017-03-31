@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-share" aria-hidden="true"></span>
      <h4>Reuniones realizadas</h4>
    </div>
    <div class="panel-body">
      <table  class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th class="text-center">Bombero</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($reuniones as $key => $asistencias)
            <tr>
              <td class="text-center">{{\Carbon\Carbon::parse($key)->format('d-m-Y')}}</td>
              <td class="text-center">
              {{ Form::open(['route' => ['material.editar'], 'method' => 'PUT']) }}
                {!! Form::hidden('asistencias', $asistencias) !!}
                <button type="submit" class="btn glyphicon glyphicon-edit simulara"></button>
              {{ Form::close() }}
              </td>
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
