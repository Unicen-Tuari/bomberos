$(document).ready(function () {
  function cargarPuntuacion(){
    var ruta= window.location.href;
    var url=ruta.substring(0, ruta.indexOf("create"));
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+mes+'/'+año+'/puntuacionmes',
			success: function(data){
						$('#puntuacion').html(data);
					},
		});
  };

  function listarPuntuacion(){
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

  listarPuntuacion();
  cargarPuntuacion();

  $('#mes').on('change',function(){
    cargarPuntuacion();
    listarPuntuacion();
  });

  $('#año').on('change',function(){
    cargarPuntuacion();
    listarPuntuacion();
  });

  function cargarResultado(bombero){
    var URLactual = window.location.href;
    var ruta=URLactual.substring(0, URLactual.indexOf("create"));
    var fecha=$('#fecha').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: ruta+'bombero/'+bombero+'/'+fecha,
			success: function(data){
						$('#resultado').html(data);
					},
		});
  };

  $('#id_bombero').on('change',function(){
    cargarResultado($(this).val())
  });

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
