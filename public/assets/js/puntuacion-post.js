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

  $('#edit').on('click',function(){
    var id = this.getAttribute('bombero');
    var formPuntuacion = $('#put');
    var url = formPuntuacion.attr('action');
    var data = formPuntuacion.serialize();
    $.ajax({
			type: 'PUT',
			url: url,
      data : data,
      })
      .done(function(dd) {
        var url= window.location.href;
        var mes=$('#mes').val();
        var year=$('#year').val();
    		$.ajax({
    			type: 'GET',
    			dataType: 'HTML',
    			url: url+'/listar/'+mes+'/'+year,
    			success: function(data){
    						$('#tabla').html(data);
    					},
    		});
      })
    .fail(function() {
      alert('Imposible modificar producto');
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
