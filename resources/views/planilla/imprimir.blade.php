<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bomberos voluntarios</title>
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-multiselect.css') !!}
    {!! Html::style('assets/css/bootstrap-toggle.min.css') !!}
    {!! Html::style('assets/css/planilla.css') !!}
</head>

<body onload="window.print()">

  <div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
          <h4>Jefe de guardia N° {{$jefe->apellido}}, {{$jefe->nombre}}
          responsable de las actividades del Orden Interno durante la semana del 
          {{$planilla->inicio_semana}} al {{$planilla->fin_semana}} de 
          {{$planilla->mes}} de {{$planilla->year}} designo y notifico al personal a mi cargo con las siguientes responsabilidades.</h4>
        </div>
      </div>

      @foreach($renglones as $key=>$renglon)
      <div class="row">
        <div class="col-xs-3 col-xs-offset-1">
            <div class="onBorder">
                <p>{{$renglon->descripcion_responsabilidad}}</p>
                <p>Móviles {{$renglon->created_at}}</p>
            </div>
        </div>
        <div class="col-xs-7">
            <div class="descripcion">
                <p id="responsable">Responsable -- Legajo: {{$responsables[$key]->legajo}}  - Nombre: {{$responsables[$key]->apellido}}, {{$responsables[$key]->nombre}} - Firma: ___________________</p>
                <p>Ayudante -- Legajo: {{$ayudantes[$key]->legajo}}  - Nombre: {{$ayudantes[$key]->apellido}}, {{$ayudantes[$key]->nombre}} - Firma: ___________________</p>
            </div>
        </div>
      </div>
      @endforeach

    {!!HTML::script('assets/js/jquery.js')!!}
    {!!HTML::script('assets/js/bootstrap.js')!!}
    {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
    {!!HTML::script('assets/js/script.js')!!}      
    {!! Html::script('assets/js/bootstrap-toggle.js') !!}
</body>
</html>