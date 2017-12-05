$(document).ready(function () {
  function cargarTabla(){
    var monthSince=$('#monthSince').val();
    var yearSince=$('#yearSince').val();
    var monthUntil=$('#monthUntil').val();
    var yearUntil=$('#yearUntil').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: '../servicio/'+monthSince+'/'+yearSince+'/'+monthUntil+'/'+yearUntil+'/tabla',
			success: function(data){
						$('#estadistica').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  $('#monthSince').on('change',function(){
    cargarTabla();
  });

  $('#yearSince').on('change',function(){
    cargarTabla();
  });

  $('#monthUntil').on('change',function(){
    cargarTabla();
  });

  $('#yearUntil').on('change',function(){
    cargarTabla();
  });


  cargarTabla();
});
