/*
$(document).on('ready',function(){

	$('form').on('submit',sendForm);
});

function sendForm(e){
	e.preventDefault();

	$.ajax({
		type:'POST',
		url: $(this).attr('action'),
		data: $(this).serialize()+'&ajax=true',
		dataType: 'json',
		success:function(datos){

			if(datos.result==true)
				alert('bien');
				$('body').append(datos);
			else
				alert('mal');

		}

	});

}
*/