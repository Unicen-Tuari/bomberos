@extends('layouts.app')

@section('content')
<article class="panel panel-default col-md-12">
  <div class="panel-heading text-center">
    <h>tipos de servicios</h>
  </div>
  <section class="panel-body col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        Lista de tipos de servicios
      </div>
      <div class="panel-body">
        <table  class="table table-bordered">
          <thead><!--Titulos de la tabla-->
            <tr>
              <th class="text-center">Nombre</th>
              <th colspan="2"></th>
            </tr>
          </thead>
          <tbody><!--Contenido de la tabla-->
            @foreach ($tipos as $tipo)
              <tr>
                <td class="text-center">{{$tipo->nombre}}</td>
                <td class="text-center">
                  {{ Form::open(['route' => ['servicio.tipo.destroy', $tipo->id], 'method' => 'delete']) }}
                      <button type="submit" class="btn glyphicon glyphicon-trash eliminar"></button>
                  {{ Form::close() }}
                </td>
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('servicio.tipo.edit', $tipo->id) }}"></a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </section>

  <section class="panel-body col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        Formulario de alta tipo de servicio
      </div>
      <div class="panel-body">
        {!! Form::open([ 'route' => 'servicio.tipo.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

          <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
            {!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}

                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              {{-- {!!Form::submit('Registrar', ['class' => 'btn btn-primary']) !!} --}}
              <button type="submit" class="btn btn-primary">
                  <i class="glyphicon glyphicon-list-alt"></i> Registrar
              </button>
            </div>
          </div>

        {!! Form::close() !!}
      </div>
    </div>
  </section>
</article>
@endsection
