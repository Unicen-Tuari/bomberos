$(document).ready(function () {
  function cargarTabla(){
		let day=$('#day').val();
    let month=$('#month').val();
    let year=$('#year').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '../servicio/'+day+'/'+month+'/'+year+'/tablaReporte',
			success: function(data){
						$('#tablaReporteServicio').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  $('#month').on('change',function(){
    cargarTabla();
  });

	$('#day').on('change',function(){
    cargarTabla();
  });

  $('#year').on('change',function(){
    cargarTabla();
  });
  cargarTabla();
});
