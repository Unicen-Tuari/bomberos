@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>usuarios</h4>
    </div>


    <div class="panel-body">
      <table class="table table-striped">
        <thead><!--Titulos de la tabla-->
          <tr>
            <th>Id Usuario</th>
            <th>Apellido, nombre</th>
            <th>Admin</th>
            <th></th>
          </tr>
        </thead>
        <tbody><!--Contenido de la tabla-->
          @foreach ($usuarios as $usuario)
              <td>{{$usuario->id}}</td>
              <td class="filtro">{{$usuario->apellido}}, {{$usuario->nombre}}</td>
              <td>{{$usuario->admin}}</td>
              @if (Auth::user()->admin)
                <td><a href="{{ route('usuario.edit', $usuario->id) }}" class="glyphicon glyphicon-edit"></a></td>
                <td>
                  @if (count($usuario->servicios)==0)
                    {{ Form::open(['route' => ['usuario.destroy', $usuario->id], 'method' => 'DELETE']) }}
                        <button type="submit" class="glyphicon glyphicon-trash"></button>
                    {{ Form::close() }}
                  @else
                    <button type="submit" class="glyphicon glyphicon-ban-circle" title="Imposible eliminar, participo en al menos un servicio"></button>

                  @endif
                </td>
              @else
                <td colspan="2">
                  <butt@section('js')
  {{ Html::script('assets/js/ajaxpuntuacion.js') }}
@endsectionon type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                </td>
              @endif
            </tr>
          @endforeach
          </tbody>
          <br>
        </table>
        <div class="text-center">
          {{ $usuarios->appends(Request::all())->links()}}
        </div>
    </div>
  </div>
</article>
@endsection
