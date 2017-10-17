$(document).ready(function () {
  function cargarTabla(){
    var mes=$('#mes').val();
    var año=$('#año').val();
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

  $('#año').on('change',function(){
    cargarTabla();
  });
  cargarTabla();
});
