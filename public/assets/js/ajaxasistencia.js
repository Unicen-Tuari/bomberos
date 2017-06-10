$(document).ready(function () {

  function filterFecha(){
    var ruta= window.location.href;
    var inicio=$('#inicio').val();
    var fin=$('#fin').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url:ruta+'/rango/'+inicio+'/'+fin,
			success: function(data){
						$('#fecha').html(data);
					},
		});
  };

  $('#buscar').on('click',function(){
    filterFecha();
  });
});
