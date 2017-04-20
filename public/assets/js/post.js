$(document).ready(function () {

  // $('.save').on('click',function(){
  //   var id = this.getAttribute('bombero');
  //   var formPuntuacion = $('#save-'+id);
  //   var url = formPuntuacion.attr('action');
  //   var data = formPuntuacion.serialize();
  //   $.post(url, data, function(result){
  //     alert("Se guardo la puntuacion");
	// 	  $('#bloque'+id).remove();
  //   });
  // });

  function suma(puntos,id){
    var total=parseInt($('#total'+id).val());
    if((total+puntos)>0 && (total+puntos)<100){
      total=total+puntos;
    }else if ((total+puntos)<0) {
      total=0;
    }else {
      total=100;
    }
    $('#total'+id).val(total);
  };

  $('#puntuacion').on('change','input.ao_acad',function(){
    var id= this.getAttribute('idacad');
    var puntos = parseInt($(this).val());
    suma(puntos,id);
  });

  $('#puntuacion').on('change','input.dedicacion',function(){
    var id= this.getAttribute('iddedicacion');
    var puntos = parseInt($(this).val());
    suma(puntos,id);
  });

  $('#puntuacion').on('change','input.especiales',function(){
    var id= this.getAttribute('idespeciales');
    var puntos = parseInt($(this).val());
    suma(puntos,id);
  });

  $('#puntuacion').on('change','input.licencia',function(){
    var id= this.getAttribute('idlicencia');
    var puntos = parseInt($(this).val());
    suma(puntos,id);
  });

  $('#puntuacion').on('change','input.castigo',function(){
    var id= this.getAttribute('idcastigo');
    var puntos = parseInt($(this).val())*(-1);
    suma(puntos,id);
  });

});
