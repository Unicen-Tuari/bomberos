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
  function calcularCombustible(){
    var factor = $('#combustible').attr('idfactor');
    var inicio = $('#horaAlarma').val();
    var horaInicio = inicio.split(' ');
    var fechaInicio = horaInicio[0].split('-');
    var diaInicio = fechaInicio[2];
    var secondsHoraInicio = horaInicio[1].split(':');
    var secondsI = (+secondsHoraInicio[0]) * 60 * 60 + (+secondsHoraInicio[1]) * 60 + (+secondsHoraInicio[2]);
    var fin = $('#horaSalida').val();
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

  $('#horaAlarma').on('change', function(){
    calcularCombustible()
  });

  $('#horaSalida').on('change', function(){
    calcularCombustible()
  });

  function cargarTabla(){
    var mes=$('#mes').val();
    var año=$('#anio').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '../servicio/'+mes+'/'+año+'/tabla',
			success: function(data){
						$('#estadistica').html(data);
					},
			error: function(){
						// alert('Error al Cargar la tabla ');
					}
		});
  };

  $('#mes').on('change',function(){
    cargarTabla();
  });

  $('#anio').on('change',function(){
    cargarTabla();
  });
  cargarTabla();
  // calcularCombustible();
});
