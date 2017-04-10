$(document).ready(function () {

  $('.save').on('click',function(){
    var id = this.getAttribute('bombero');
    var formPuntuacion = $('#save-'+id);
    var url = formPuntuacion.attr('action');
    var data = formPuntuacion.serialize();
    $.post(url, data, function(result){
      alert("Se guardo la puntuacion");
		  $('#bloque'+id).remove();
    });

  });

});
