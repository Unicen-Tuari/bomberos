$(document).ready(function () {

  function suma(){
    var asistencia = parseInt($('#ao_punt').val());
    var academia = parseInt($('#ao_acad').val());
    var accidpunt = parseInt($('#accid_punt').val());
    var dedicacion = parseInt($('#dedicacion').val());
    var guardia = parseInt($('#guar_punt').val());
    var especiales = parseInt($('#especiales').val());
    var licencia = parseInt($('#licencia').val());
    var castigo = parseInt($('#castigo').val() * (-1));
    var total = asistencia + academia + accidpunt + dedicacion + guardia + especiales + licencia + castigo;
    if (total < 0) {
      total=0;
    }else if (total > 100) {
      total=100;
    }
    $('#total').val(total);
  };

  suma();

  $('#ao_acad').on('change',function(){
    suma();
  });

  $('#dedicacion').on('change',function(){
    suma();
  });

  $('#especiales').on('change',function(){
    suma();
  });

  $('#licencia').on('change',function(){
    suma();
  });

  $('#castigo').on('change',function(){
    suma();
  });

});
