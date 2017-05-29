$(document).ready(function () {
  function cargarPuntuacion(id){
    $('#puntuacion').empty();
    var ruta= window.location.href;
    var url=ruta.substring(0, ruta.indexOf("create"));
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+mes+'/'+año+'/'+id+'/puntuacionmes',
			success: function(data){
						$('#puntuacion').html(data);
					},
		});

  };

  $('#lista').on('click','.mp',function(){
    var id= this.getAttribute('idmodal');
    cargarPuntuacion(id);
  });

});
