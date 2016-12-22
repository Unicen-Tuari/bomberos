$(document).ready(function () {

  $('#ingresar').on('click',function(){
    var id = $('#bomberoIngreso').val();

    var formIngresar = $('#form-ingresar');
    $('#ingresado').val(id);
    var url = formIngresar.attr('action');
    var data = formIngresar.serialize();
    $.post(url, data, function(result){
<<<<<<< HEAD
      alert(result + "ingresado");
=======
      alert("Se registro el ingreso");
>>>>>>> 7a4b9d0466be6fc41a158b951eb133a62ca00a60
    });

  });

  $('#egresar').on('click',function(){
    var id = $('#bomberoIngreso').val();
    var formDelete = $('#form-delete');
    var url = formDelete.attr('action').replace(':USER_ID', id);
    var data = formDelete.serialize();
    alert(url);
    $.post(url, data, function(result){
<<<<<<< HEAD
      alert(result + "retirado" );
=======
      alert("Se registro el egreso");
>>>>>>> 7a4b9d0466be6fc41a158b951eb133a62ca00a60
    });
  });

});
