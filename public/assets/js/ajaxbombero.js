$(document).ready(function () {

  $('.panel-body').on('click','a.eliminarb',function(){
    var idbombero = this.getAttribute('idbombero');
    $('#bombero-'+idbombero).remove();
  });

  $('#nuevobombero').on('change', function(){
    var bombero=$(this).val();
    var URLactual = window.location.href;
    var ruta=URLactual.substring(0, URLactual.indexOf("ingreso"));
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: ruta+'/ingreso/nuevo/'+bombero,
			success: function(data){
						$('.bomberosparticipantes').append(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  });

});
