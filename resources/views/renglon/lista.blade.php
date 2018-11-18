@extends('layouts.app')

@section('content')
<article class="col-sm-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-sticky-note" aria-hidden="true"></span>
      <h4>Datos de la planilla</h4>
    </div>

    <div class="panel-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Descripción responsabilidad</th>
            <th>Responsable</th>
            <th>Ayudante</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($renglones as $renglon)
          <td>{{$renglon->descripcion_responsabilidad}}</td>
          <td>{{$renglon->responsable}}</td>
          <td>{{$renglon->ayudante}}</td>
          <td><a href="{{ route('renglon.edit',[$renglon->planilla_id,$renglon->id]) }}" class="glyphicon glyphicon-edit"></a></td>
          <td>
              <form action="{{route('renglon.destroy',[$renglon->planilla_id,$renglon->id])}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="glyphicon glyphicon-trash"></button>
              </form>
          </td>
        </tr>
        @endforeach
      </tbody>
      <br>
    </table>
    <div class="form-group">
            <label class="col-md-4 control-label"  > Nuevo dato</label>
            <div class="col-md-6">            
            <button type="submit" class="btn btn-success"> <a href="" class= "glyphicon glyphicon-plus"></a>
            </button>
            </div>
         </div>  
  </div>
</div>
</article>
@endsection
