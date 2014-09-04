
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

	$('#js-form').validate();


	$('.js-addUser').on('click',showModal);

	
}

$(document).on('ready',onReady);
