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
    filter = $(".inputFilter").val().toUpperCase();
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

  function filterAssist() {
    // Declare variables
    var filter, label;
    filter = $(".inputFilter").val().toUpperCase();
    $(".bomberosparticipantes").children('div').each(function(){
      label = $(this).children('label')[0].textContent;
      if (label) {
        if (label.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  function filterTable() {
    var filter, td;
    filter = $(".inputFilter").val().toUpperCase();
    $(".tableFilter").children('tr').each(function(){
      td = $(this).children('.filtro')[0].textContent;
      if (td) {
        if (td.toUpperCase().indexOf(filter) > -1) {
          $(this).show();
        } else {
          $(this).hide();
        }
      }
    });
  };

  $('.inputFilter').on('keyup',function(){
    filterTable();
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
