@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Usuarios</h4>
    </div>

    <div class="col-sm-12">
      <div class="col-md-7 col-sm-12 text-right" style="padding-top: 20px;">
        <form class="form-horizontal" action={{route("usuario.index")}} method="GET">
          <div class="col-sm-4">
            <input class="form-control" type="text" name="nombre" placeholder= "Apellido/Nombre">
          </div>
          <div class="col-sm-4">
            <input class="form-control" type="text" name="id" placeholder= "Id Usuario">
          </div>
          <div class="col-sm-1">
            <button class="btn btn-primary" type="submit" >Buscar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id Usuario</th>
            <th>Apellido, Nombre</th>
            <th>Admin</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
          <td>{{$usuario->id}}</td>
          <td class="filtro">{{$usuario->apellido}}, {{$usuario->nombre}}</td>
          <td>{{$usuario->admin}}</td>
          @if (Auth::user()->admin)
          <td><a href="{{ route('usuario.edit', $usuario->id) }}" class="glyphicon glyphicon-edit"></a></td>
          <td>
            @if (count($usuario->servicios)==0)
              <form action="{{route('usuario.destroy',$usuario)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="glyphicon glyphicon-trash"></button>
              </form>
            @else
            <button type="submit" class="glyphicon glyphicon-ban-circle" title="Imposible eliminar, participo en al menos un servicio"></button>
            @endif
          </td>
          @else
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
