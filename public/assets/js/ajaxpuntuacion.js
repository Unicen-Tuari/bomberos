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

  if(window.location.href.indexOf("create") == -1){
    listarPuntuaciones();
  }else{
    listarBomberos();
  }

  function filterTablePuntuacion() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("inputFilterPuntuacion");
    filter = input.value.toUpperCase();
    table = document.getElementById("tablaPuntuacion");
    tr = table.getElementsByTagName("tr");
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  };

  $('#inputFilterPuntuacion').on('keyup',function(){
    filterTablePuntuacion();
  });
});
