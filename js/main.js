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

			console.log(dataForm);

			$.ajax({

			});

		},

		errorPlacement:function(error,element){
			element.parent().append('<div class="errorItem"></div>').find('.errorItem').html(error);

		}
	});


	$('.js-addUser').on('click',showModal);

	
}

$(document).on('ready',onReady);
