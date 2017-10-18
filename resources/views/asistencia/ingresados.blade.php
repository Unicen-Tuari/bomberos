
<table  class="table table-striped">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th class="text-center">Bombero</th>
      <th class="text-center">Presencia</th>
      <th class="text-center"></th>
    </tr>
  </thead>
  <tbody><!--Contenido de la tabla-->
    @foreach ($ingresados as $ingresado)
      <tr>
        <td class="text-center">{{ $ingresado->bombero->nombre." ". $ingresado->bombero->apellido}}</td>
        <td class="text-center"> En el Cuartel</td>
        <td>
          {{ Form::open(['route' => ['ingreso.borrarIngreso', $ingresado->bombero->id], 'method' => 'DELETE']) }}
              <button type="submit" title="Retirar bombero" class="glyphicon glyphicon-log-out"></button>
          {{ Form::close() }}
        </td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3" class="text-center">Bomberos ingresados</td>
    </tr>
  </tfoot>
</table>
