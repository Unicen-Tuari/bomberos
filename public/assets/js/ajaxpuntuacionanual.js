$(document).ready(function () {

  function Puntuacionanual(){
    var url= window.location.href;
    var bombero=$('#bombero').val();
    var inicio=$('#inicio').val();
    var fin=$('#fin').val();
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: url+'/'+bombero+'/'+inicio+'/'+fin,
			success: function(data){
						$('#tablaxaño').html(data);
					},
		});
  };

  $('#buscar').on('click',function(){
    Puntuacionanual();
  });

  $('#bombero').on('change',function(){
    Puntuacionanual();
  });

  Puntuacionanual();

});
