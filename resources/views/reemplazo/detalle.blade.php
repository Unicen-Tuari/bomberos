@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-exchange" aria-hidden="true"></span>
      <h4>Detalles</h4>
    </div>
    <div class="panel-body">
      <div class="form-horizontal">
        <div class="form-group">
          <label for="id_bombero" class="col-md-4 control-label">Bombero a reemplazar:</label>
          <div class="col-md-6">
            <p class="form-control-static">{{$reemplazo->bombero}}</p>
          </div>
        </div>

        <div class="form-group">
          <label for="id_bombero_reemplazo" class="col-md-4 control-label">Bombero reemplazo:</label>
          <div class="col-md-6">
            <p class="form-control-static">{{$reemplazo->bombero_reemplazo}}</p>
          </div>
        </div>

        <div class="form-group">
          <label for="fecha_inicio" class="col-md-4 control-label">Desde:</label>
          <div class="col-md-6">
            <p class="form-control-static">{{$reemplazo->fecha_inicio}}</p>
          </div>
        </div>

        <div class="form-group">
          <label for="fecha_fin" class="col-md-4 control-label">Hasta:</label>
          <div class="col-md-6">
            <p class="form-control-static">{{$reemplazo->fecha_fin}}</p>
          </div>
        </div>

        <div class="form-group">
          <label for="razon" class="col-md-4 control-label">Razon:</label>
          <div class="col-md-6">
            <p class="form-control-static">{{$reemplazo->razon}}</p>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <form action="{{route('reemplazo.index')}}" method="GET">
              <button type="submit" class="btn btn-primary">Volver</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>
@endsection
