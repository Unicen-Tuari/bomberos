@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <!-- <span class="fa fa-user" aria-hidden="true"></span> -->
      <h4>Alta de renglones de la planilla</h4>
    </div>
    <div class="panel-body">

     <form class="form-horizontal" action='{{route("renglon.store")}}' method="POST">
        {{csrf_field()}}
        {{method_field('POST')}}

        <div class="form-group {{ $errors->has('descripcion_responsabilidad') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="descripcion_responsabilidad" > Descripción de responsabilidad</label>
          <div class="col-md-6">
            <input class="form-control" type="text" name="descripcion_responsabilidad" placeholder= "Vehículo, materiales o edificio">
              @if ($errors->has('descripcion_responsabilidad'))
                  <span class="help-block">
                    <strong>{{ $errors->first('descripcion_responsabilidad') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('responsable') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="responsable" > Responsable</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="responsable" placeholder= "Responsable">
                    @if ($errors->has('responsable'))
                        <span class="help-block">
                            <strong>{{ $errors->first('responsable') }}</strong>
                        </span>
                    @endif
              </div>
        </div>

        <div class="form-group {{ $errors->has('ayudante') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="ayudante" > Ayudante</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="ayudante" placeholder= "Ayudante">
                    @if ($errors->has('ayudante'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ayudante') }}</strong>
                        </span>
                    @endif
              </div>
        </div>

         <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <button type="submit" class="btn btn-primary">
                  <i class=" glyphicon glyphicon-user">Guardar</i>
              </button>
            </div>

         </div>
      </div>
    </div>
  </article>
 @endsection
