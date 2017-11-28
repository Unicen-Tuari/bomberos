@extends('layouts.app')

@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-edit" aria-hidden="true"></span>
        <h4>Material {{$material->nombre}} {{$material->id}}</h4>
      </div>
      <div class="panel-body form-horizontal">
        <div class="form-group">
          <label for="nombre" class="col-md-4 control-label">Nombre: </label>
          <div class="col-md-6">
            {!! Form::text('nombre', $material->nombre, ['class' => 'form-control' ,'disabled']) !!}
          </div>
        </div>

        <div class="form-group">
          <label for="vehiculo_id" class="col-md-4 control-label">Esta en el vehiculo: </label>
          <div class="col-md-2">
            {{Form::select('vehiculo_id',$vehiculos, $material->vehiculo_id, ['class' => 'form-control','disabled'])}}
          </div>
        </div>

        <div class="form-group">
          <label for="rubro" class="col-md-4 control-label">Rubro: </label>
          <div class="col-md-2">
            {{Form::select('rubro',config('selects.rubro'), $material->rubro, ['class' => 'form-control','disabled'])}}
          </div>
        </div>

        <div class="form-group">
          <div class="">
            <label for="mantenimiento" class="col-md-4 control-label">Mantenimiento: </label>
            <div class="col-md-2">
              {!! Form::checkbox('mantenimiento', 1,$material->mantenimiento,['disabled']) !!}
            </div>
          </div>

          <div>
            <label for="reparado" class="col-md-4 control-label">Veces reparado: </label>
            <div class="col-sm-1 ">
              {!! Form::text('reparado', $material->reparado,['class' => 'form-control','disabled' => 'disabled']) !!}
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="detalle" class="col-md-4 control-label">Detalle: </label>
          <div class="col-sm-6">
            {!! Form::textarea('detalle', $material->detalle, ['class' => 'form-control' , 'rows' => '8','disabled']) !!}
          </div>
        </div>

        <div class="form-group">
          <div class=" col-sm-3 col-sm-offset-6">
            <a href="{{route('material.index')}}" class="">
              <button type="submit" class="btn btn-primary glyphicon glyphicon-ok">
                Volver</button></a>
              </div>
            </div>

          </div>
        </div>
      </article>
    @endsection
