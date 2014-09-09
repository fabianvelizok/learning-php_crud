function showModal(){

	var idUser = $(this).data('id');
	$('#action').val('addUser');
	$('#userId').val(0);

	$('#js-form').dialog({
		autoOpen:true,
		title: 'Add User',
	});
}

function onReady(){

	$('#js-form').dialog({
		autoOpen:false,
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
				minlength: 4
			},
			user_position:{
				minlength: 3
			},
			user_nick:{
				minlength: 3
			},
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
				url:'php/ajaxUsers.php',
				data: dataForm,

				success:function(data){

					if(data.answer==true){
						if($('#action').val() == 'editUser') $('#insert tbody').empty();
						
						if($('#insert #notData').length){
							$('#insert tbody').html(data.data);
							
						}else{
							$('#insert tbody').append(data.data);

						}

						$('#js-form').dialog('close');

						
					}else{
						console.log(data.message);
					}

					$('.fullScreen').hide();
				},

				error:function(){
					alert('ERROR!');
					
				}
			});

		},

		errorPlacement:function(error,element){
			element.parent().append('<div class="errorItem"></div>').find('.errorItem').html(error);

		}
	});


	$('.js-addUser').on('click',showModal);

	$('td.center #js-editUser').on('click',function(){
		$('#insert tbody tr').removeClass('selected');

		var idUser = $(this).data('id'),
			itemToSelect = $(this).parent().parent().find('td');
		
		$('#action').val('editUser');
		$('#userId').val(idUser);
		$('#js-form').dialog({
			autoOpen:true,
			title: 'Edit User',
		});

		$('#userName').val(itemToSelect.eq(0).html());
		$('#userPosition').val(itemToSelect.eq(1).html());
		$('#userNick').val(itemToSelect.eq(2).html());
		$('#selectStatus option[value="'+itemToSelect.eq(3).html()+'"]').attr('selected',true);

	});

	$('td.center #js-deleteUser').on('click',function(){

		var idUser = $(this).data('id')
			,parentItem = $(this).parent().parent();
		$('#action').val('deleteUser');
		$('#userId').val(idUser);
		$('#js-form').dialog('close');

		
		textAlert = 'Esta seguro de eliminar este registro?'

		if(confirm(textAlert)) parentItem.remove();

	});

	
}

$(document).on('ready',onReady);
