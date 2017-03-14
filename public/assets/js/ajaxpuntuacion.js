$(document).ready(function () {
  function cargarPuntuacion(){
    var URLactual = window.location.href;
    var ruta=URLactual.substring(0, URLactual.indexOf("asistencia"));
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: ruta+'asistencia/'+mes+'/'+año+'/puntuacionmes',
			success: function(data){
						$('#puntuacion').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  cargarPuntuacion();

  $('#mes').on('change',function(){
    cargarPuntuacion();
  });

  $('#año').on('change',function(){
    cargarPuntuacion();
  });
});
