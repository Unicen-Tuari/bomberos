$(document).ready(function () {

  function listarBomberos(){
    var ruta= window.location.href;
    var url=ruta.substring(0, ruta.indexOf("create"));
    var mes=$('#mes').val();
    var year=$('#year').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+'bomberos/'+mes+'/'+year,
			success: function(data){
						$('#lista').html(data);
					},
		});
  };

  function listarPuntuaciones(){
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
  };

  $('#mes').on('change',function(){
    if(window.location.href.indexOf("create") == -1){
      listarPuntuaciones();
    }else{
      listarBomberos();
    }
  });

  $('#year').on('change',function(){
    if(window.location.href.indexOf("create") == -1){
      listarPuntuaciones();
    }else{
      listarBomberos();
    }
  });

  $('#tabla').on('click','#edit',function(){
    listarPuntuaciones();
  });

  if(window.location.href.indexOf("puntuacion/create") != -1){
    //pregunto si estoy en cargar puntuacion
    listarBomberos();
  }else if(window.location.href.indexOf("puntuacion")!=-1){
    //pregunto si estoy en listar puntuacion
    listarPuntuaciones();
  }


  function filter(palabra, dome, hijos, element) {
    $(dome).children(hijos).each(function(){
      var campo = $(this).children(element)[0].textContent;
      if (campo) {
        if (campo.toUpperCase().indexOf(palabra) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  $('.inputFilter').on('keyup',function(){
    var palabra=$(this).val().toUpperCase();
    filter(palabra,".tableFilter",'tr','.filtro');
    filter(palabra,".tableFilter",'div','.filtro');
    filter(palabra,".tableFilter",'div','.filtro');
  });

  function filterTableOnOff(filter) {
    // Declare variables
    $(".tableFilter").children('tr').each(function(){
      var td = $(this).find('a')[0].getAttribute('asistencia');
      if (td) {
        if (td.indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  $('#all').on('click',function(){
    filterTableOnOff("");
  });

  $('#on').on('click',function(){
    filterTableOnOff("onn");
  });

  $('#off').on('click',function(){
    filterTableOnOff("off");
  });
});
