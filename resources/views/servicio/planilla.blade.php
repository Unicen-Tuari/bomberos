@extends('layouts.app')
@section('content')
  <article class="col-sm-12">
    <div class="panel panel-default">
      <div id="breadcrumb" class="panel-heading">
        <span class="fa fa-print" aria-hidden="true"></span>
        <h4>Reporte de Servicio - <span id="idServicio">{{$id}}</span></h4>
      </div>
      <div class="container-fluid" id="planillaReporteServicio">
        <div class="row">
          <div class="col-xs-12 col-md-12 table-responsive">
            <div id="tablaReporteServicio">

            </div>
            <div class="col-xs-12 col-md-12">
              <p>01: Incendio - 02: Auxilio - 03: Especiales - 04: Desastre - 05: Colaboración - 06: Guardias <br>
                07: Comando - 08: Tecnico - 09: Ceremonial - 10: Productos Quimicos - 11: Forestales
              </p>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2 text-center">
              <link rel="icon" type="image/png" href="../assets/images/logoPlanilla.png"/>
              <img src="/assets/images/logoPlanilla.png" alt="">
            </div>
            <div class="col-md-8 text-center">
              <h4>ASOCIACION BOMBEROS VOLUNTARIOS DE TRENQUE LAUQUEN</h4>
              <div class="text-center separate">
                <h5>Parte de Asistencia del Personal del cuerpo activo</h5>
              </div>
            </div>
            <div id="tablaAsistenciaDelPersonal">

            </div>
            <table class="text-center table table-bordered">
              <tr>
                <td>Jefe de Servicio</td>
                <td>Oficial de Servicio</td>
                <td>Jefe de Cuerpo</td>
              </tr>
              <tr>
                <td><br><br><br></td>
                <td><br><br><br></td>
                <td><br><br><br></td>
              </tr>
            </table>
            <div class="col-md-12">
              <p>PRESENTE: 01: GUARDIA - COMANDO - CEREMONIAL - ASISTENCIA PROGRAMADA<br>
                02: EN PRIMERA DOTACION - 03: EN OTRA DOTACION - 04: EN EL CUARTEL - 05: EN COMISION
              </p>
              <p>AUSENTES: 06: LICENCIA - 07: ENFERMO - 08: CUMPLIENDO CASTIGO - 09: CON AVISO - 10: SIN AVISO <br>
                EN SERVICIOS ACCIDENTALES: LOS AUSENTES SE DEBEN TACHAR CON UNA RAYA.
              </p>
            </div>
            <div class="col-md-12">
              <h5>OBSERVACIONES:</h5>
              <table class="table table-bordered">
                <tr>
                  <td></td>
                </tr>
              </table>
              <div class="col-md-12">
                <button type="submit" id="print" class="btn btn-default pull-left">
                  <i class=" glyphicon glyphicon-print"></i> Imprimir
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
@endsection

@section('js')
  {!! Html::script('assets/js/imprimirreporte.js') !!}
  {!! Html::script('assets/js/ajaxservicio.js') !!}
@endsection
