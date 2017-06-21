$(document).ready(function () {

  function changeActive(menu){
    $("#MainMenu").find(".activo").removeClass("activo");
    $(menu).addClass("activo");
  }

  $('#bomberoMenu').on('click', function(){
    changeActive(this);
  });

  $('#asistenciaMenu').on('click', function(){
    changeActive(this);
  });

  $('#servicioMenu').on('click', function(){
    changeActive(this);
  });

  $('#vehiculoMenu').on('click', function(){
    changeActive(this);
  });

  $('#materialMenu').on('click', function(){
    changeActive(this);
  });

  $('.selectMultiple').multiselect({
        enableFiltering: true,
        enableCaseInsensitiveFiltering : true,
        includeSelectAllOption: true,
        selectAllJustVisible: true,
        maxHeight: 300,
  });

  var anterior=0;
  var primero =0;

  $('#listavehiculos').on('change', function(){
    primero = $(this).val();
    if (primero.length<2) {
      $('#listavehiculo').val(primero);
      $('#listavehiculo').multiselect("refresh");
      anterior=$('#listavehiculo').val();
    }
    calcularCombustible();
  });

  $('#listavehiculo').on('change', function(){
    primero = $(this).val();
    var vehiculos=[];
    vehiculos=$('#listavehiculos').val();
    var pos=vehiculos.indexOf(anterior);
    if (pos>-1) {
      vehiculos.splice(pos,1);
    }
    anterior=primero;
    vehiculos.unshift(anterior);
    $('#listavehiculos').val(vehiculos);
    $('#listavehiculos').multiselect("refresh");
    calcularCombustible();
  });

  function calcularCombustible(){
    var factor = $('#combustible').attr('idfactor');
    var inicio = $('#horaSalida').val();
    var horaInicio = inicio.split(' ');
    var fechaInicio = horaInicio[0].split('/');
    var diaInicio = fechaInicio[0];
    var secondsHoraInicio = horaInicio[1].split(':');
    var secondsI = (+secondsHoraInicio[0]) * 60 * 60 + (+secondsHoraInicio[1]) * 60 + (+secondsHoraInicio[2]);
    var fin = $('#horaRegreso').val();
    var horaFin = fin.split(' ');
    var fechaFin = horaFin[0].split('/');
    var diaFin = fechaFin[0];
    var secondsHoraFin = horaFin[1].split(':');
    var secondsF = (+secondsHoraFin[0]) * 60 * 60 + (+secondsHoraFin[1]) * 60 + (+secondsHoraFin[2]);
    var dias = diaFin - diaInicio;
    var mes=fechaFin[1]-fechaInicio[1];
    if ((dias)>0||mes>0){
      if (mes>0) {
        secondsF +=( (diaFin)*24 * 60 * 60);
      }else{
        secondsF +=( dias*24 * 60 * 60);
      }
    }
    var cantVehiculos=$('#listavehiculos option:selected').length;
     $('#combustible').val((factor * (secondsF-secondsI)/60)*cantVehiculos);
  };

  $('#horaSalida').on('change', function(){
    calcularCombustible()
  });

  $('#horaRegreso').on('change', function(){
    calcularCombustible()
  });

  // calcularCombustible();
});
