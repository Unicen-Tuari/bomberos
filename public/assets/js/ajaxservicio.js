$(document).ready(function () {
  function cargarTablaServicio(){
   let id = $('#id').html();
     $.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '/servicio/reporte/planilla/' + id,
			success: function(data){
						$('#tablaReporteServicio').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  function cargarTablaAsistencia(){
    let id = $('#id').html();
    $.ajax({
      type: 'GET',
      dataType: 'HTML',
      url: '/servicio/reporte/asistencia/' + id,
      success: function(data){
            $('#tablaAsistenciaDelPersonal').html(data);
          },
      error: function(){
            alert('Error al Cargar la tabla ');
          }
    });
  };

  function cargarTablas(){
    cargarTablaServicio();
    cargarTablaAsistencia();
  }

  cargarTablas();
});
