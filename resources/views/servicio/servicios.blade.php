@extends('layouts.app')

@section('content')

  <article class="col-md-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-list" aria-hidden="true"></span>
        <h4>Ultimos servicios realizados</h4>
      </div>
      <div class="col-sm-12">
        <div class="col-md-10 col-sm-12 text-right" style="padding-top: 20px;">
          <form class='form-horizontal' action="{{route('servicio.index')}}" method='GET'>
            <div class="col-sm-3">
              <select class="form-control" name="tipo_servicio">
                <option value=0 >Tipo de Servicio</option>
                @foreach(config('selects.tipoServicio') as $key => $tipo_servicio)
                  <option value="{{$key}}" @if ($key == old('tipo_servicio')) value="{{old('tipo_servicio')}}" selected="selected" @endif>{{$tipo_servicio}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-3">
                <select class="form-control" name="tipo_alarma">
                  <option value=0 >Tipo de Alarma</option>
                  @foreach(config('selects.tipoAlarma') as $key => $tipo_alarma)
                    <option value={{$key}} @if ($key == old('tipo_alarma')) value="{{old('tipo_alarma')}}" selected="selected" @endif>{{$tipo_alarma}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-3">
                  <select class="form-control" name="month">
                    <option value=0 >MES</option>
                    @foreach(config('selects.meses') as $key => $month)
                      <option value={{$key}} @if($key == old('month')) value="{{old('month')}}" selected @endif >{{$month}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <input class="form-control" name="year" @if(old('year')) value="{{old('year')}}" @endif placeholder="{{\Carbon\Carbon::now()->format('Y')}}">
                    </div>
                    <div class="col-sm-1">
                      <button class="btn btn-primary" type="submit" name="Buscar">Buscar</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="panel-body">
                <table  class="table table-bordered">
                  <thead><!--Titulos de la tabla-->
                    <tr>
                      <th class="text-center">Tipo de servicio</th>
                      <th class="text-center">Direccion</th>
                      <th class="text-center">Hora de regreso</th>
                      <th class="text-center" colspan="3">Acciones</th>
                    </tr>
                  </thead>
                  <tbody><!--Contenido de la tabla-->
                    @foreach ($servicios as $servicio)
                      @if ($servicio->hora_regreso)
                        <tr>
                          <td class="text-center"><a href="{{route('servicio.show', $servicio->id)}}">{{config('selects.tipoServicio')[$servicio->tipo_servicio_id]}}</a></td>
                          <td class="text-center">{{$servicio->direccion}}</td>
                          <td class="text-center">{{\Carbon\Carbon::parse($servicio->hora_regreso)->format('d/m/Y H:i:s')}}</td>
                          <td class="text-center"><a class="glyphicon glyphicon-list-alt" href="{{route('servicio.planilla',$servicio->id)}}"></a></td>
                          @if (Auth::user()->admin)
                            <td class="text-center"><form class="form-horizontal" action="{{route('servicio.destroy', $servicio->id)}}" method="POST">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <button type="submit" class="glyphicon glyphicon-trash"></button>
                            </form></td>
                            <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{route('servicio.edit', $servicio->id)}}"></a></td>
                          @else
                            <td class="text-center" colspan="2">
                              <button type="submit" class="glyphicon glyphicon-ban-circle" title="Sin permisos para eliminar/modificar"></button>
                            </td>
                          @endif
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
                @if (!$ultimos)
                  <div class="text-center">
                    {{ $servicios->appends(Request::all())->render()}}
                  </div>
                @endif
              </div>
            </div>
          </article>
        @endsection
