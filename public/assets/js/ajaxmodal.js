$(document).ready(function () {
  function cargarPuntuacion(ruta){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: ruta,
			success: function(data){
						$('#puntuacion').html(data);
					},
		});

  };

  $('#lista').on('click','.mp',function(){
    var id= this.getAttribute('idmodal');
    $('#puntuacion').empty();
    var ruta= window.location.href;
    var url=ruta.substring(0, ruta.indexOf("create"));
    var mes=$('#mes').val();
    var año=$('#año').val();
    cargarPuntuacion(url+mes+'/'+año+'/'+id+'/puntuacionmes');
  });

  $('#tablaPuntuacion').on('click','.mp',function(){
    var id= this.getAttribute('idmodal');
    var ruta= window.location.href;
    cargarPuntuacion(ruta+'/'+id+'/edit');
  });

});
