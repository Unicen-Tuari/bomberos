@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-exchange" aria-hidden="true"></span>
      <h4>Alta reemplazo</h4>
    </div>

    <div class="col-md-12">
      <div class="col-md-12 text-right" style="padding-top: 20px;">
        <form class='form-horizontal' action="{{route('reemplazo.'.$button)}}" method='GET'>
          <div class="col-md-1 col-md-offset-11">
            <input class="btn btn-primary" type="submit" name="terminados" value={{$button}}>
          </div>
        </form>
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th>Reemplazado</th>
            <th>Reemplazo</th>
            <th>Desde</th>
            <th>Hasta</th>
            <th>Razon</th>
            <th></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach($reemplazos as $reemplazo)
            <tr>
              <td class="col-md-2">{{$reemplazo->bombero}}</td>
              <td class="col-md-2">{{$reemplazo->bombero_reemplazo}}</td>
              <td class="col-md-2">{{$reemplazo->fecha_inicio}}</td>
              <td class="col-md-2">{{$reemplazo->fecha_fin}}</td>
              <td class="col-md-3">{{$reemplazo->razon}}</td>
              @if (Auth::user()->admin)
                <td><a href="{{route('reemplazo.edit', $reemplazo->id)}}" class="glyphicon glyphicon-edit"></a></td>
                <td>
                  <form action="{{route('reemplazo.destroy', $reemplazo->id)}}" method="POST">
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
          <br>
        </table>
        <div class="text-center">

        </div>
    </div>
  </div>
</article>
@endsection
