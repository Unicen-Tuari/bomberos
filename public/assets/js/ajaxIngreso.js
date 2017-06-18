$(document).ready(function () {

  $('#ingresar').on('click',function(){
    var ruta= window.location.href;
    var urlingresados=ruta.substring(0, ruta.indexOf("home"));
    var id = $('#bomberoIngreso').val();
    var formIngresar = $('#form-ingresar');
    $('#ingresado').val(id);
    var url = formIngresar.attr('action');
    var data = formIngresar.serialize();
    if (id>0) {
      $.post(url, data, function(){
      }).done(function() {
          $.ajax({
            type: 'GET',
            dataType: 'HTML',
            url: urlingresados+'ingreso/listar',
            success: function(data){
                  $('#datos').html(data);
                },
          });
          $('#bomberoIngreso').val(0);
          $('#bomberoIngreso').multiselect("refresh");
      });
    }

  });

  $('#egresar').on('click',function(){
    var id = $('#bomberoIngreso').val();
    var formDelete = $('#form-delete');
    var url = formDelete.attr('action').replace(':USER_ID', id);
    var data = formDelete.serialize();
    $.post(url, data, function(){
    }).done(function() {
        $('#bomberoIngreso').val(0);
        $('#bomberoIngreso').multiselect("refresh");
    });
  });

});
