var pag = 8;

$(document).ready(function(){

	// default
   	$('#pagina-1').fadeIn();
   	$('#anterior').css('display', 'none');
   	$('#finalizar').css('display', 'none');
   	$('#siguiente').css('display', 'block');

	// click en numeros
   	$(document).on("click", ".lnk-pag", function(){
		var valor = $(this).attr('to');
		paginas(valor);
		$('.lnk-pag').removeClass('activo');
		$(this).addClass('activo');
   	});

   	// siguiente
   	$(document).on("click", "#siguiente", function(){
   		var valor = $(this).attr('to');
   		siguiente(valor);
   	});

   	// anterior
   	$(document).on("click", "#anterior", function(){
   		var valor = $(this).attr('to');
   		anterior(valor);

   		if(valor == 1 ){
			$('#anterior').css('display', 'none');
		}
   	});

   	// ver / ocultar  sub-pregunta
   	$(document).on("click", ".sub-preg", function(){
   		var valor = $(this).attr('sub');
   		var status = $(this).attr('status');
		var increment = $(this).attr('increment');

   		var val = parseInt(valor) + 1;

		if(increment == 'false'){
   			val = valor;
   		}

   		if(status == 'false'){
   			$('#sub-pregunta'+val).fadeOut();
   		}else if(status == 'true'){
   			$('#sub-pregunta'+val).fadeIn();
   			console.log('#sub-pregunta'+val);
   		}
   	});



});


//cambio de página internio
function paginas(pagina){

	for ( i = 1 ; i<= pag ; i++) {
		$('#pagina-'+i).css('display','none');
	};

	$('#pagina-'+pagina).fadeIn();

}


function anterior(pagina){
	var val = parseFloat(pagina) + 1;
	var val2 = parseFloat(pagina) - 1;
	$('#anterior').attr('to',val2);
	$('#siguiente').attr('to',val);

	for ( i = 1 ; i<= pag ; i++) {
		$('#pagina-'+i).css('display','none');
	};

	$('#pagina-'+pagina).fadeIn();

   	$('.lnk-pag').removeClass('activo');
	$('#numero-'+ pagina).addClass('activo');

	if($('#siguiente').attr('to') < 9 ){
		$('#siguiente').css('display', 'block');
		$('#finalizar').css('display', 'none');
	}

}

function siguiente(pagina){

	valor = pagina - 1;

	if(valor == 1  || valor == 2){
		
		if ($('input[name="pregunta'+valor+'"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);

	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');
			
			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to') == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else {
		        alert('Se debe seleccionar una opción');
		}

	}else if(valor == 3){

		if ($('input[name="pregunta4"]').is(':checked') && $('input[name="pregunta6"]').is(':checked') && $('input[name="pregunta8"]').is(':checked') && $('input[name="pregunta10"]').is(':checked') && 
			$('input[name="pregunta12"]').is(':checked') && $('input[name="pregunta14"]').is(':checked') && $('input[name="pregunta16"]').is(':checked') && $('input[name="pregunta18"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);

	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');
			
			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to')  == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else   {
			alert('Debe seleccionar una opción en cada item de la A a la H');
		}

	}else if(valor == 4){

		if ($('input[name="pregunta20"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);
	   		

	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');

			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to') == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else {
		        alert('Se debe seleccionar una opción');
		}

	}else if(valor == 5){

		if ($('input[name="pregunta21"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);
	   		
	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');

			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to')  == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else {
		        alert('Se debe seleccionar una opción');
		}

	}else if(valor == 6){
		if ($('input[name="pregunta23"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);
	   		
	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');

			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to')  == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else {
		        alert('Se debe seleccionar una opción');
		}

	}else if(valor == 7){
		if ($('input[name="pregunta25"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);
	   		
	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');

			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to')  == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}
		}else {
		        alert('Se debe seleccionar una opción');
		}

	}else if(valor == 8){
		if ($('input[name="pregunta27"]').is(':checked') ) {
			paginas(pagina);
			var val = parseFloat(pagina) + 1;
			var val2 = parseFloat(pagina) - 1;
	   		$('#siguiente').attr('to',val);
	   		$('#anterior').attr('to',val2);
	   		
	   		$('.lnk-pag').removeClass('activo');
			$('#numero-'+ pagina).addClass('activo');

			if($('#siguiente').attr('to',val) != 0 ){
				$('#anterior').css('display', 'block');
			}
			if($('#siguiente').attr('to')  == 9 ){
				$('#siguiente').css('display', 'none');
				$('#finalizar').css('display', 'block');
			}

		}else {
		        alert('Se debe seleccionar una opción');
		}

	}







}


