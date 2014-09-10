
var User = {

	Add:function(){
		var idUser = $(this).data('id');
		$('#action').val('addUser');
		$('#userId').val(0);

		$('#js-form').dialog({
			autoOpen:true,
			title: 'Add User',
		});

		$('#js-form input[type="text"]').val('');
		$('#js-form select option').removeAttr('selected');
		$('#js-form select option[disabled="true"]').attr('selected',true);
	},

	Edit:function(){
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
		$('#selectStatus option').removeAttr('selected');
		$('#selectStatus option[value="'+itemToSelect.eq(3).html()+'"]').attr('selected',true);
	},

	Delete:function(){
		var idUser = $(this).data('id')
			,parentItem = $(this).parent().parent();

		$('#action').val('deleteUser');
		$('#userId').val(idUser);
		$('#js-form').dialog('close');

		
		$('#js-boxDeleteUser').dialog('open');

	}

}

function validate(){

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
						if($('#action').val() == 'editUser'){
							$('#insert tbody').empty();
							
						}
						
						if($('#insert #notData').length){
							$('#insert tbody').html(data.data);
							
						}else{
							$('#insert tbody').append(data.data);

						}

						$('#js-form').dialog('close');

						$('td.center #js-editUser').on('click',User.Edit)
						$('td.center #js-deleteUser').on('click',User.Delete);

						
					}else{
						console.log(data.message);
					}

					$('.fullScreen').hide();
				},

				error:function(){
					alert('Error add User o Edit User!');
					
				}
			});

		},

		errorPlacement:function(error,element){
			element.parent().append('<div class="errorItem"></div>').find('.errorItem').html(error);

		}

	});
}

function dialog(){

	$('#js-form').dialog({
		autoOpen:false,
		modal:true,
		closeOnScape: true,
		widht: 'auto',
		height: 'auto',

		close:function(){
			$('#js-form input[type="text"]').val('');
			$('#js-form select option').removeAttr('selected');

		}

	});
	
	$('#js-boxDeleteUser').dialog({
		autoOpen:false,
		modal:true,
		closeOnScape: true,
		widht: 'auto',
		height: 'auto',
		buttons: { 

			Ok:function(){

				var dataEdit = 'user_id='+$('#userId').val()+'&action='+$('#action').val();

				$.ajax({
					beforeSend:function(){
						$('.fullScreen').show();
					},
					cache: false,
					method: 'POST',
					dataType: 'json',
					url:'php/ajaxUsers.php',
					data: dataEdit,

					success:function(response){

						if(response.answer==true){
							if($('#action').val() == 'deleteUser') $('#insert tbody').empty();		
							
							$('#insert tbody').append(response.data);
							
							$('#js-boxDeleteUser').dialog('close');

							$('td.center #js-editUser').on('click',User.Edit)
							$('td.center #js-deleteUser').on('click',User.Delete);

							
						}else{
							console.log(response.message);
						}

						$('.fullScreen').hide();
					},

					error:function(error){
						alert.log(error.message);
						
					}
				});


			},

			Cancel:function(){
				$(this).dialog('close');

			}
			
		}
	});

}


function onReady(){


	dialog();
	validate();
	$('#js-addUser').on('click',User.Add);
	$('td.center #js-editUser').on('click',User.Edit)
	$('td.center #js-deleteUser').on('click',User.Delete);

	
}


$(document).on('ready',onReady);
