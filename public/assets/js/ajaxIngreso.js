$(document).ready(function () {

  function cargarIngreso(){
    var idBombero=$('#bomberoIngreso').val();
		$.ajax({
			type: 'POST',
			url: '../ingreso/'+idBombero,
			success: function(data){
						alert(data);
					},
			error: function(data){
						alert(data);
					}
		});
  };

  $('#ingresar').on('click',function(){
    cargarIngreso();
  });

  $('#egresar').on('click',function(){
    cargarIngreso();
  });

});
