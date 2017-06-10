$(document).ready(function () {

  $('#buscar').on('click',function(){
    var ruta= window.location.href;
    var inicio=$('#inicio').val().replace(/\//gi, "-");
    var fin=$('#fin').val().replace(/\//gi, "-");
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url:ruta+'/rango/'+inicio+'/'+fin,
			success: function(data){
						$('#fecha').html(data);
					},
		});
  });

});
