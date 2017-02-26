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
        includeSelectAllOption: true,
        selectAllJustVisible: true,
        maxHeight: 300,
  });

  $('#listavehiculos').on('change', function(){
    calcularCombustible()
  });
  $('#listavehiculo').on('change', function(){
    $('#listavehiculos').val($(this).val());
    calcularCombustible()
  });
  function calcularCombustible(){
    var factor = $('#combustible').attr('idfactor');
    var inicio = $('#horaSalida').val();
    var horaInicio = inicio.split(' ');
    var fechaInicio = horaInicio[0].split('-');
    var diaInicio = fechaInicio[2];
    var secondsHoraInicio = horaInicio[1].split(':');
    var secondsI = (+secondsHoraInicio[0]) * 60 * 60 + (+secondsHoraInicio[1]) * 60 + (+secondsHoraInicio[2]);
    var fin = $('#horaRegreso').val();
    var horaFin = fin.split(' ');
    var fechaFin = horaFin[0].split('-');
    var diaFin = fechaFin[2];
    var secondsHoraFin = horaFin[1].split(':');
    var secondsF = (+secondsHoraFin[0]) * 60 * 60 + (+secondsHoraFin[1]) * 60 + (+secondsHoraFin[2]);
    var dias = diaFin - diaInicio;
    if ((dias)>0){
      secondsF +=( dias*24 * 60 * 60);
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
  $('#baja').on('click', function(){
    if ($(this).prop("checked")){
      $("#activo").prop("checked","");
    }
  });
  $('#activo').on('click', function(){
    if ($(this).prop("checked")){
      $("#baja").prop("checked","");
    }
  });

  // calcularCombustible();
});
