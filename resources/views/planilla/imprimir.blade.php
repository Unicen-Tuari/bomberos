<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Bomberos voluntarios</title>
    {!! Html::style('assets/css/planilla.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/bootstrap-multiselect.css') !!}
    {!! Html::style('assets/css/bootstrap-toggle.min.css') !!}
</head>

<body>

  <div class="container" id="printeable">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h4>Jefe de guardia N° {{$planilla->jefe_guardia}} 
          responsable de las actividades del Orden Interno durante la semana del 
          {{$planilla->inicio_semana}} al {{$planilla->fin_semana}} de 
          {{$planilla->mes}} de {{$planilla->year}} designo y notifico al personal a mi cargo con las siguientes responsabilidades.</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="onBorder">
                <p>{{$renglon->descripcion_responsabilidad}}</p>
                <p>Móviles {{$renglon->created_at}}</p>
            </div>
        </div>
        <div class="col-md-7">
            <div class="descripcion">
                <p id="responsable">Responsable - Legajo: Nombre: </p>
                <p>Ayudante - Legajo: Nombre: </p>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="onBorder">
                <p>{{$renglon->descripcion_responsabilidad}}</p>
                <p>Móviles {{$renglon->created_at}}</p>
            </div>
        </div>
        <div class="col-md-7">
            <div class="descripcion">
                <p id="responsable">Responsable - Legajo: Nombre: </p>
                <p>Ayudante - Legajo: Nombre: </p>
            </div>
        </div>
      </div>

    {!!HTML::script('assets/js/jquery.js')!!}
    {!!HTML::script('assets/js/bootstrap.js')!!}
    {!!HTML::script('assets/js/bootstrap-multiselect.js')!!}
    {!!HTML::script('assets/js/script.js')!!}      
    {!! Html::script('assets/js/bootstrap-toggle.js') !!}

<script>
function Imprimir(){

  var mywindow = window.open('', 'PRINT', 'height=800,width=1200');
  mywindow.document.write('<!DOCTYPE html><html lang="en">');
  mywindow.document.write(document.getElementsByTagName('head')[0].innerHTML);
  mywindow.document.write('<body >');
  mywindow.document.write(document.getElementById("printeable").innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close();
  mywindow.focus();

  mywindow.print();
  mywindow.close();

/*        <div class="container">
            <div class="row" id="topSign">
                <div class="col-sm-2 col-sm-offset-1">
                    <button onclick="print()" type="submit" class="btn btn-primary">
                        <i class="fa fa-exchange"></i> Imprimir
                    </button>
                </div>
            </div>
        </div>
    </div>*/


}
</script>

</body>
</html>