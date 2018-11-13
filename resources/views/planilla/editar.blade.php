@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar Planilla</h4>
    </div>
    <div class="panel-body">

      <form action="{{route('planilla.update',$planilla)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group {{ $errors->has('jefe_guardia') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="jefe_guardia" > Jefe de Guardia</label>
        <div class="col-md-6">
                    <input class="form-control" type="text" name="jefe_guardia" value="{{$planilla->jefe_guardia}}">
              @if ($errors->has('jefe_guardia'))
                  <span class="help-block">
                      <strong>{{ $errors->first('jefe_guardia') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('nro_guardia') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="nro_guardia" > Nro de Guardia</label>
          <div class="col-md-6">
                    <input class="form-control" type="text" name="nro_guardia" value="{{$planilla->nro_guardia}}">
              @if ($errors->has('nro_guardia'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nro_guardia') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('inicio_semana') ? ' has-error' : '' }}">
          <label class="col-md-4 control-label" name="inicio_semana" > Día del inicio de semana</label>
          <div class="col-md-6">
                <input class="form-control" type="text" name="inicio_semana" value="{{$planilla->inicio_semana}}">
              @if ($errors->has('inicio_semana'))
                  <span class="help-block">
                      <strong>{{ $errors->first('inicio_semana') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('fin_semana') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="fin_semana" > Día del final de semana</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="fin_semana" value= "{{$planilla->fin_semana}}">
                    @if ($errors->has('fin_semana'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fin_semnana') }}</strong>
                        </span>
                    @endif
              </div>
        </div>

        <div class="form-group {{ $errors->has('mes') ? ' has-error' : '' }}">
          <label for="mes" class="col-md-4 control-label">Mes</label>
          <div class="col-md-6">
            <select class="form-control" name="mes">
              <option value="{{$planilla->mes}}">{{$planilla->mes}} </option>
             <option value="Enero">Enero</option>
             <option value="Febrero">Febrero</option>
             <option value="Marzo">Marzo</option>
             <option value="Abril">Abril</option>
             <option value="Mayo">Mayo</option>
             <option value="Junio">Junio</option>
             <option value="Julio">Julio</option>
             <option value="Agosto">Agosto</option>
             <option value="Septiembre">Septiembre</option>
             <option value="Octubre">Octubre</option>
             <option value="Noviembre">Noviembre</option>
             <option value="Diciembre">Diciembre</option>
            </select>
            @if ($errors->has('mes'))
                <span class="help-block">
                    <strong>{{$errors->first('mes')}}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label" name="year" > Año</label>
              <div class="col-md-6">
                <input class="form-control" type="text" name="year" value= "{{$planilla->year}}">
                    @if ($errors->has('año'))
                        <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
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
