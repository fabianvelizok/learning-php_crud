function showModal(){

	$('#js-form').dialog('open');
}

function onReady(){

	$('#js-form').dialog({
		autoOpen:false,
		title: 'Add user',
		closeOnScape: true,
		widht: 'auto',
		height: 'auto',

		close:function(){
			$('#js-form input[type="text"]').val('');
			$('#js-form select option').removeAttr('selected');

		}
	});

	$('#js-form').validate({
		rules:{
			user_name:{
				required: true,
				minlength: 3
			}
		},
		
		submitHandler:function(){

			var dataForm = $('#js-form').serialize();

			$.ajax({
				beforeSend:function(){
					$('.fullScreen').show();
				},
				cache: false,
				method: 'POST',
				dataType: 'json',
				url:'../php/ajaxUsers.php',
				data: dataForm + '&action=addUser',

				success:function(data){

					if(data.answer==true){
						$('#js-form').dialog('close');
						$('#insert tbody').append(data.data);
						
					}else{
						console.log('Error al enviar los datos del servidor');
					}

					$('.fullScreen').hide();
				},

				error:function(){
					console.log('ERROR!!!!!!!!');
					
				},
			});

		},

		errorPlacement:function(error,element){
			element.parent().append('<div class="errorItem"></div>').find('.errorItem').html(error);

		}
	});


	$('.js-addUser').on('click',showModal);

	
}

$(document).on('ready',onReady);
