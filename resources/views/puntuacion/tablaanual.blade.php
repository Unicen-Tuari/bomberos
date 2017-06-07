<table  class="table table-bordered">
  <thead><!--Titulos de la tabla-->
    <tr>
      <th class="text-center">AÑO</th>
      <th class="text-center">1</th>
      <th class="text-center">2</th>
      <th class="text-center">3</th>
      <th class="text-center">4</th>
      <th class="text-center">5</th>
      <th class="text-center">6</th>
      <th class="text-center">7</th>
      <th class="text-center">8</th>
      <th class="text-center">9</th>
      <th class="text-center">10</th>
      <th class="text-center">11</th>
      <th class="text-center">12</th>
      <th class="text-center">TOTAL</th>
    </tr>
  </thead>
  <tbody id="tablaPuntuacion">
    @for ($año=$inicio; $año <=$fin ; $año++)
      <tr>
        @php
          $total=0;
        @endphp
        <td class="text-center">{{$año}}</td>
        @for ($mes=1; $mes < 13 ; $mes++)
          @if ($bombero->puntuo($mes,$año))
            @php
              $total+=$bombero->puntuacion($mes,$año)->total;
            @endphp
            <td class="text-center">{{$bombero->puntuacion($mes,$año)->total}}</td>
          @else
            <td class="text-center">0</td>
          @endif
        @endfor
        <td class="text-center">{{$total}}</td>
      </tr>
    @endfor
  </tbody>
  <tfoot>
    <tr>
      <td class="text-center" colspan="14"> lista de bomberos activos </td>
    </tr>
  </tfoot>
  <br>
</table>
