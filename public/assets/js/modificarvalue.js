$(document).ready(function () {
  function modificarValue(){
    // var admin
    $('#admin').on('change',function(){
      if (($('#admin')).checked() == false)
        alert (0);
      else
        alert(1);
    });
  };
});
