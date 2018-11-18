@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar datos de la planilla</h4>
    </div>
    <div class="panel-body">

      <form action="{{route('renglon.update',[$renglon->planilla_id, $renglon->id])}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group {{ $errors->has('planilla_id') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="planilla_id" > Numero de planilla</label>
        <div class="col-md-6">
                    <input class="form-control" type="text" name="planilla_id" value="{{$renglon->planilla_id}}">
              @if ($errors->has('planilla_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('planilla_id') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('descripcion_responsabilidad') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="descripcion_responsabilidad" > Descripcion de responsabilidades</label>
          <div class="col-md-6">
                    <input class="form-control" type="text" name="descripcion_responsabilidad" value="{{$renglon->descripcion_responsabilidad}}">
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
                <input class="form-control" type="text" name="responsable" value="{{$renglon->responsable}}">
              @if ($errors->has('responsable'))
                  <span class="help-block">
                      <strong>{{ $errors->first('responsable') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('ayudante') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="ayudante" >Ayudante</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="ayudante" value= "{{$renglon->ayudante}}">
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

</article>
@endsection