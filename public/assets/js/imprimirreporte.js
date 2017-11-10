$('#print').on("click",function(){
	let planilla = document.getElementById('planillaReporteServicio').innerHTML;
	let contenidoOriginal = document.body.innerHTML;
	document.body.innerHTML = planilla;
	window.print();
	document.body.innerHTML = contenidoOriginal;
});
