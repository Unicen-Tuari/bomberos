$(document).ready(function () {
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
						alert('Error al Cargar la tabla ');
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
});
