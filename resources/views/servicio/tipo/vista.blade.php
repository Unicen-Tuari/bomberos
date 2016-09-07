@extends('layouts.app')

@section('content')
<div class="container">
  <div class="panel  panel-default text-center">
    <h>tipos de servicios</h>
  </div>
  <article class="container col-md-6">
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
                  {{ Form::open(['route' => ['tipo.destroy', $tipo->id], 'method' => 'delete']) }}
                      <button type="submit" class="btn btn-danger btn-mini glyphicon glyphicon-trash"></button>
                  {{ Form::close() }}
                </td>
                <td class="text-center"><a class="glyphicon glyphicon-edit" href="{{ route('tipo.edit', $tipo->id) }}"></a></td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td class="text-center" colspan="3"> tipos de servicios </td>
              </tr>
            </tfoot>
            <br>
          </table>
      </div>
    </div>
  </article>

  <aside class="container col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        Formulario de alta bombero
      </div>
      <div class="panel-body">
        {!! Form::open([ 'route' => 'tipo.store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}

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
  </aside>
</div>
@endsection
