$(document).ready(function () {

  $('#save').on('click',function(){
    var id = this.getAttribute('bombero');
    var formPuntuacion = $('#post');
    var url = formPuntuacion.attr('action');
    var data = formPuntuacion.serialize();
    $.post(url, data, function(result){
		  $('#modal'+id).remove();

    });
  });

  function suma(id){
    var asistencia = parseInt($('#asistencia'+id).val());
    var academia = parseInt($('#academia'+id).val());
    var accidpunt = parseInt($('#accidpunt'+id).val());
    var dedicacion = parseInt($('#dedicacion'+id).val());
    var guardia = parseInt($('#guardia'+id).val());
    var especiales = parseInt($('#especiales'+id).val());
    var licencia = parseInt($('#licencia'+id).val());
    var castigo = parseInt($('#castigo'+id).val() * (-1));
    var total = asistencia + academia + accidpunt + dedicacion + guardia + especiales + licencia + castigo;
    if (total < 0) {
      total=0;
    }else if (total > 100) {
      total=100;
    }
    $('#total'+id).val(total);
  };

  $('#puntuacion').on('change','input.ao_acad',function(){
    var id= this.getAttribute('idacad');
    suma(id);
  });

  $('#puntuacion').on('change','input.dedicacion',function(){
    var id= this.getAttribute('iddedicacion');
    suma(id);
  });

  $('#puntuacion').on('change','input.especiales',function(){
    var id= this.getAttribute('idespeciales');
    suma(id);
  });

  $('#puntuacion').on('change','input.licencia',function(){
    var id= this.getAttribute('idlicencia');
    suma(id);
  });

  $('#puntuacion').on('change','input.castigo',function(){
    var id= this.getAttribute('idcastigo');
    suma(id);
  });

});
