@extends('layouts.app')

@section('content')

  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-bar-chart" aria-hidden="true"></span>
        <h4>Estadisticas</h4>
      </div>
      <div class="form-horizontal">
        <div class="panel-body">
          <label class="col-md-1 control-label" for="month">Mes:</label>
          <div class="col-md-2">
            <select id="month" class="form-control" name="meses">
              @foreach(config('selects.meses') as $key => $mes)
                <option  @if($key == \Carbon\Carbon::now()->format('m')) selected @endif value={{$key}} >{{$mes}}</option>
                @endforeach
              </select>
            </div>
            <label class="col-md-1 control-label" for="year">Año:</label>
            <div class="col-md-2">
              <input id="year" class="form-control" value={{\Carbon\Carbon::now()->format('Y')}}>
            </div>
          </div>
          <div id="estadistica">

          </div>
        </div>
      </div>
    </article>
  @endsection

  @section('js')
    <script src="assets/js/ajaxtabla.js" type="text/javascript"></script>
  @endsection
