$(document).ready(function () {
  function cargarPuntuacion(){
    var URLactual = window.location.href;
    var ruta=URLactual.substring(0, URLactual.indexOf("asistencia"));
    var mes=$('#mes').val();
    var año=$('#año').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: ruta+'asistencia/'+mes+'/'+año+'/puntuacionmes',
			success: function(data){
						$('#puntuacion').html(data);
					},
			error: function(){
						alert('Error al Cargar la tabla ');
					}
		});
  };

  cargarPuntuacion();

  $('#mes').on('change',function(){
    cargarPuntuacion();
  });

  $('#año').on('change',function(){
    cargarPuntuacion();
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
  }

  $('#inputFilterPuntuacion').on('keyup',function(){
    filterTablePuntuacion();
  });
});
