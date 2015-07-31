$(document).ready(function(){

   	$(document).on("click", ".lnk-pag", function(){
		var valor = $(this).attr('to');
		paginas(valor);
   	});


});

var pag = 8;

function paginas(pagina){

	$('#pagina-'+pagina).fadeIn();

	for (var i = 1 ; i<=30; i++) {

		if(pagina != i){
			$('#pagina-'+i).fadeOut();
		}
		
	};


}
