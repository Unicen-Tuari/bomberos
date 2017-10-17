@extends('layouts.app')

@section('content')
<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-edit" aria-hidden="true"></span>
      <h4>Editar material</h4>
    </div>
    <div class="panel-body">
      {!! Form::open([ 'route' => ['material.update', $material ], 'class' => 'form-horizontal', 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
          {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-6">
              {!! Form::text('nombre', $material->nombre, ['class' => 'form-control']) !!}

              @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
              @endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('vehiculo_id') ? ' has-error' : '' }}">
          {!! Form::label('vehiculo_id', 'Esta en el vehiculo: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('vehiculo_id',['' => 'Ninguno'] + $vehiculos, $material->vehiculo_id, ['class' => 'form-control'])}}
          </div>
          @if ($errors->has('vehiculo_id'))
              <span class="help-block">
                  <strong>{{ str_replace(" id "," ",$errors->first('vehiculo_id')) }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group  {{ $errors->has('rubro') ? ' has-error' : '' }}">
          {!! Form::label('rubro', 'Rubro: ',['class' => 'col-md-4 control-label']) !!}
          <div class="col-md-2">
            {{Form::select('rubro',config('selects.rubro'), $material->rubro, ['class' => 'form-control'])}}
          </div>
          @if ($errors->has('rubro'))
              <span class="help-block">
                  <strong>{{ $errors->first('rubro') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
          <div class="{{ $errors->has('mantenimiento') ? ' has-error' : '' }}">
            {!! Form::label('mantenimiento', "Mantenimiento", ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-2">
                {!! Form::checkbox('mantenimiento', 1,$material->mantenimiento) !!}

                @if ($errors->has('mantenimiento'))
                    <span class="help-block">
                        <strong>{{ $errors->first('mantenimiento') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div>
            {!! Form::label('reparado', "Veces reparado", ['class' => 'col-md-2 control-label']) !!}
            <div class="col-sm-1 ">
              {!! Form::text('reparado', $material->reparado,['class' => 'form-control','disabled' => 'disabled']) !!}
            </div>
          </div>
        </div>

        <div class="form-group {{ $errors->has('detalle') ? ' has-error' : '' }}">
          {!! Form::label('detalle', 'Detalle',['class' => 'col-sm-4 control-label']) !!}
          <div class="col-sm-6">
              {!! Form::textarea('detalle', $material->detalle, ['class' => 'form-control' , 'rows' => '8']) !!}

              @if ($errors->has('detalle'))
                  <span class="help-block">
                      <strong>{{ $errors->first('detalle') }}</strong>
                  </span>
              @endif
          </div>
        </div>


        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class=" glyphicon glyphicon-wrench"></i> Editar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection
