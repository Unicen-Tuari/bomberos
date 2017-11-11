$(document).ready(function () {
  function cargarTablaServicio(){
    let id = $('#idServicio').html();
     $.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '/servicio/reporte/tablaServicio/' + id,
			success: function(data){
						$('#tablaReporteServicio').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  function cargarTablaAsistencia(){
    let id = $('#idServicio').html();
    $.ajax({
      type: 'GET',
      dataType: 'HTML',
      url: '/servicio/reporte/tablaAsistencia/' + id,
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
