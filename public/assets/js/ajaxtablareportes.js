$(document).ready(function () {
  function cargarTabla(){
    var month=$('#month').val();
    var year=$('#year').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '../servicio/'+month+'/'+year+'/tabla',
			success: function(data){
						$('#reportes').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  $('#month').on('change',function(){
    cargarTabla();
  });

  $('#year').on('change',function(){
    cargarTabla();
  });
  cargarTabla();
});
