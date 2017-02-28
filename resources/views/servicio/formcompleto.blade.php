
    <div class="form-group">
      {!! Form::label('num_servicio', 'Nº servicio:',['class' => 'col-sm-8 control-label']) !!}
      <div class="col-sm-1">
        {!! Form::text('num_servicio', $numero, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group ">
      <div class="{{ $errors->has('tipo_servicio_id') ? ' has-error' : '' }}">
        {!! Form::label('tipo', 'Tipo de servicio',['class' => 'col-sm-2 col-sm-offset-1 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('tipo', $tipos,$tipo,['class' => 'form-control'])}}

          @if ($errors->has('tipo_servicio_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('tipo_servicio_id') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('tipo_alarma') ? ' has-error' : '' }}">
        {!! Form::label('tipo_alarma', 'Tipo alarma',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('tipo_alarma', [null =>'Ninguna',1 => 'Interna',2 => 'Selectiva',3 => 'General'],$tipo_alarma or 1,['class' => 'form-control'])}}

          @if ($errors->has('tipo_alarma'))
              <span class="help-block">
                  <strong>{{ $errors->first('tipo_alarma') }}</strong>
              </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('autor_llamada') ? ' has-error' : '' }}">
      {!! Form::label('autor_llamada', 'Autor llamada',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::text('autor_llamada', $llamada, ['class' => 'form-control']) !!}

          @if ($errors->has('autor_llamada'))
              <span class="help-block">
                  <strong>{{ $errors->first('autor_llamada') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('direccion') ? ' has-error' : '' }}">
      {!! Form::label('direccion', 'Direccion',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::text('direccion', $direccion, ['class' => 'form-control']) !!}

          @if ($errors->has('direccion'))
              <span class="help-block">
                  <strong>{{ $errors->first('direccion') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group">
        <div class="{{ $errors->has('bombero') ? ' has-error' : '' }}">
          {!! Form::label('bombero', 'Bombero a cargo',['class' => 'col-sm-2 col-sm-offset-1 control-label']) !!}
          <div class="col-sm-1">
            {{Form::select('bombero', $ingresados,$bombero,['class' => 'selectMultiple'])}}
            @if ($errors->has('bombero'))
                <span class="help-block">
                    <strong>{{ $errors->first('bombero') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="{{ $errors->has('vehiculo') ? ' has-error' : '' }}">
          {!! Form::label('vehiculo', 'Movil',['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-1">
            {{Form::select('vehiculo', $vehiculos,$primero,['class' => 'selectMultiple', 'id'=>'listavehiculo'])}}
            @if ($errors->has('vehiculo'))
                <span class="help-block">
                    <strong>{{ $errors->first('vehiculo') }}</strong>
                </span>
            @endif
          </div>
        </div>

        <div class="{{ $errors->has('vehiculos') ? ' has-error' : '' }}">
          {!! Form::label('vehiculos', 'Vehiculos involucrados',['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-1">
            @php unset($vehiculos[0])
            @endphp
            {{Form::select('vehiculos[]', $vehiculos,$involucrados,['class' => 'selectMultiple', 'multiple'=>'multiple', 'id'=>'listavehiculos'])}}
            @if ($errors->has('vehiculos'))
                <span class="help-block">
                    <strong>{{ $errors->first('vehiculos') }}</strong>
                </span>
            @endif
          </div>
        </div>

    </div>

    <div class="form-group">
      <div class="{{ $errors->has('ilesos') ? ' has-error' : '' }}">
        {!! Form::label('ilesos', 'Ilesos',['class' => 'col-sm-2 col-sm-offset-1 control-label']) !!}
        <div class="col-md-1">
            {!! Form::text('ilesos', $ilesos , ['class' => 'form-control']) !!}

            @if ($errors->has('ilesos'))
                <span class="help-block">
                    <strong>{{ $errors->first('ilesos') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="{{ $errors->has('lesionados') ? ' has-error' : '' }}">
        {!! Form::label('lesionados', 'Lesionados',['class' => 'col-md-1 control-label']) !!}
        <div class="col-md-1">
            {!! Form::text('lesionados', $lesionados , ['class' => 'form-control']) !!}

            @if ($errors->has('lesionados'))
                <span class="help-block">
                    <strong>{{ $errors->first('lesionados') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="{{ $errors->has('quemados') ? ' has-error' : '' }}">
        {!! Form::label('quemados', 'Quemados',['class' => 'col-md-1 control-label']) !!}
        <div class="col-md-1">
            {!! Form::text('quemados', $quemados , ['class' => 'form-control']) !!}

            @if ($errors->has('quemados'))
                <span class="help-block">
                    <strong>{{ $errors->first('quemados') }}</strong>
                </span>
            @endif
        </div>
      </div>

    </div>

    <div class="form-group">
      <div class="{{ $errors->has('muertos') ? ' has-error' : '' }}">
        {!! Form::label('muertos', 'Muertos',['class' => 'col-sm-2 col-sm-offset-1 control-label']) !!}
        <div class="col-sm-1">
            {!! Form::text('muertos', $muertos , ['class' => 'form-control']) !!}

            @if ($errors->has('muertos'))
                <span class="help-block">
                    <strong>{{ $errors->first('muertos') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="{{ $errors->has('otros') ? ' has-error' : '' }}">
        {!! Form::label('otros', 'Otros',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-1">
            {!! Form::text('otros', $otros , ['class' => 'form-control']) !!}

            @if ($errors->has('otros'))
                <span class="help-block">
                    <strong>{{ $errors->first('otros') }}</strong>
                </span>
            @endif
        </div>
      </div>

      <div class="{{ $errors->has('superficie') ? ' has-error' : '' }}">
        {!! Form::label('superficie', 'Superficie',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-1">
            {!! Form::text('superficie', $superficie , ['class' => 'form-control']) !!}

            @if ($errors->has('superficie'))
                <span class="help-block">
                    <strong>{{ $errors->first('superficie') }}</strong>
                </span>
            @endif
        </div>
      </div>

    </div>

    <div class="form-group {{ $errors->has('cuartel_colaborador') ? ' has-error' : '' }}">
      {!! Form::label('cuartel_colaborador', 'Cuartel colaborador',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::text('cuartel_colaborador', $cuartel, ['class' => 'form-control']) !!}

          @if ($errors->has('cuartel_colaborador'))
              <span class="help-block">
                  <strong>{{ $errors->first('cuartel_colaborador') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('combustible') ? ' has-error' : '' }}">
      {!! Form::label('combustible', 'Combustible',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::text('combustible', $combustible , ['class' => 'form-control', 'id'=>'combustible', 'idfactor'=> 0.3333]) !!}

          @if ($errors->has('combustible'))
              <span class="help-block">
                  <strong>{{ $errors->first('combustible') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('reconocimiento') ? ' has-error' : '' }}">
      {!! Form::label('reconocimiento', 'Reconocimiento',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
          {!! Form::textarea('reconocimiento', $reconocimiento, ['class' => 'form-control' , 'rows' => '8']) !!}

          @if ($errors->has('reconocimiento'))
              <span class="help-block">
                  <strong>{{ $errors->first('reconocimiento') }}</strong>
              </span>
          @endif
      </div>
    </div>

    <div class="form-group {{ $errors->has('disposiciones') ? ' has-error' : '' }}">
      {!! Form::label('disposiciones', 'Disposiciones',['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('disposiciones', $disposiciones, ['class' => 'form-control', 'rows' => '4']) !!}

        @if ($errors->has('disposiciones'))
            <span class="help-block">
                <strong>{{ $errors->first('disposiciones') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="{{ $errors->has('alarma') ? ' has-error' : '' }}">
        {!! Form::label('alarma', 'Hora alarma',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
          {!! Form::text('alarma', $hora ,['class' => 'form-control']) !!}

          @if ($errors->has('alarma'))
              <span class="help-block">
                  <strong>{{ $errors->first('alarma') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('salida') ? ' has-error' : '' }}">
        {!! Form::label('salida', 'Hora salida',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
          {!! Form::text('salida', $salida ,['class' => 'form-control', 'id'=>'horaSalida']) !!}

          @if ($errors->has('salida'))
              <span class="help-block">
                  <strong>{{ $errors->first('salida') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('regreso') ? ' has-error' : '' }}">
        {!! Form::label('regreso', 'Hora regreso',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
          {!! Form::text('regreso', $regreso ,['class' => 'form-control', 'id'=>'horaRegreso']) !!}

          @if ($errors->has('regreso'))
              <span class="help-block">
                  <strong>{{ $errors->first('regreso') }}</strong>
              </span>
          @endif
        </div>
      </div>

    </div>

    <div class="form-group">
      <div class="{{ $errors->has('jefe_servicio') ? ' has-error' : '' }}">
        {!! Form::label('jefe_servicio', 'Jefe Servicio',['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('jefe_servicio', $bomberos,$jefe,['class' => 'selectMultiple'])}}

          @if ($errors->has('jefe_servicio'))
              <span class="help-block">
                  <strong>{{ $errors->first('jefe_servicio') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('oficial') ? ' has-error' : '' }}">
        {!! Form::label('oficial', 'Oficial',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('oficial', $bomberos,$oficial,['class' => 'selectMultiple'])}}

          @if ($errors->has('oficial'))
              <span class="help-block">
                  <strong>{{ $errors->first('oficial') }}</strong>
              </span>
          @endif
        </div>
      </div>

      <div class="{{ $errors->has('jefe_de_cuerpo') ? ' has-error' : '' }}">
        {!! Form::label('jefe_de_cuerpo', 'Jefe de cuerpo',['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-2">
          {{Form::select('jefe_de_cuerpo', $bomberos,$jcuerpo,['class' => 'selectMultiple'])}}
          @if ($errors->has('jefe_de_cuerpo'))
              <span class="help-block">
                  <strong>{{ $errors->first('jefe_de_cuerpo') }}</strong>
              </span>
          @endif
        </div>
      </div>

    </div>

    <div class="col-sm-6 col-sm-offset-3">
      {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
      <button type="submit" class="btn btn-primary">
          <i class="glyphicon glyphicon-ok"></i> Finalizar
      </button>
    </div>
