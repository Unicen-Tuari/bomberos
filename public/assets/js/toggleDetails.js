$(document).ready(function () {

  $('.toggleDetails').on('click',function(event){
    event.preventDefault();
    $(".toggleDetails").toggleClass('glyphicon-minus glyphicon-plus');
    $(".dataLlamada").toggle(500);
  });

});
