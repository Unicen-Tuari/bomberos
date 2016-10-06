$(document).ready(function () {

  function changeActive(menu){
    $("#MainMenu").find(".activo").removeClass("activo");
    $(menu).addClass("activo");
  }

  $('#bomberoMenu').on('click', function(){
    changeActive(this);
  });

  $('#asistenciaMenu').on('click', function(){
    changeActive(this);
  });

  $('#servicioMenu').on('click', function(){
    changeActive(this);
  });

  $('#vehiculoMenu').on('click', function(){
    changeActive(this);
  });

  $('#materialMenu').on('click', function(){
    changeActive(this);
  });

  $('.selectMultiple').multiselect({
        enableFiltering: true,
        includeSelectAllOption: true,
        selectAllJustVisible: true,
        maxHeight: 300,
  });

});
