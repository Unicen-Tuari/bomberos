$(document).ready(function () {

  function listarBomberos(){
    var ruta= window.location.href;
    var url=ruta.substring(0, ruta.indexOf("create"));
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+'bomberos/'+mes+'/'+año,
			success: function(data){
						$('#lista').html(data);
					},
		});
  };

  function listarPuntuaciones(){
    var url= window.location.href;
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+'/listar/'+mes+'/'+año,
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

  $('#año').on('change',function(){
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

  function filterlist() {
    var  filter, p;
    filter = $("#inputFilterPuntuacion").val().toUpperCase();
    $("#listaPuntuacion").children('div').each(function(){
      p = $(this).children('p')[0].textContent;
      if (p) {
        if (p.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  function filterTablePuntuacion() {
    // Declare variables
    var filter, td;
    filter = $("#inputFilterPuntuacion").val().toUpperCase();
    $("#tablaPuntuacion").children('tr').each(function(){
      td = $(this).children('td')[1].textContent;
      if (td) {
        if (td.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  function filterAssist() {
    // Declare variables
    var filter, lablel;
    filter = $("#inputFilterPuntuacion").val().toUpperCase();
    $(".bomberosparticipantes").children('div').each(function(){
      lablel = $(this).children('label')[0].textContent;
      if (lablel) {
        if (lablel.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  $('#inputFilterPuntuacion').on('keyup',function(){
    filterTablePuntuacion();
    filterlist();
    filterAssist();
  });

  function filterTableOnOff(filter) {
    // Declare variables
    $("#tablaPuntuacion").children('tr').each(function(){
      td = $(this).find('a')[0].getAttribute('asistencia');
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
