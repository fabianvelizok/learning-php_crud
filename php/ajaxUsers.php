<?php
	
	sleep(2);
	$dataOk = false;
	$messageError = 'No se pudo ejecutar la app';
	$content = ''; 

	include('mainFunctions.php');

	if($errorDb!=true){
		if(isset($_POST) && !empty($_POST)){

			switch ($_POST['action']) {
				case 'addUser':

					$userName 		= $_POST['user_name'];
					$userPosition 	= $_POST['user_position'];
					$userNick 		= $_POST['user_nick'];
					$userStatus 	= $_POST['user_status'];

					$query = "INSERT INTO user (user_name, user_position, user_nick, user_status) VALUES ('$userName', '$userPosition', '$userNick', '$userStatus')";

					$rsql = $mysqli -> query($query); 

					$userId = $mysqli -> insert_id;

					if($rsql==true){
						$dataOk = true;
						$messageError = 'Se insertaron los valores';
						$content = '<tr>
										<td>'.$_POST['user_name'].'</td>
										<td>'.$_POST['user_position'].'</td>
										<td>'.$_POST['user_nick'].'</td>
										<td>'.$_POST['user_status'].'</td>
										<td class="center">
											<button id="js-editUser" data-id="'.$userId.'" class="btn btn-warning">Edit</button>
											<button id="js-deleteUser" data-id="'.$userId.'" class="btn btn-danger">Delete</button>
										</td>
									</tr>
						';

					}else{
						$dataOk = false;
						$messageError = 'No se pudieron guardar los valores en la db';
					}

				break;

				case 'editUser':

					$userName 		= $_POST['user_name'];
					$userPosition 	= $_POST['user_position'];
					$userNick 		= $_POST['user_nick'];
					$userStatus 	= $_POST['user_status'];
					$userId			= $_POST['user_id'];

					$query = "UPDATE user SET user_name='$userName', user_position='$userPosition', user_nick='$userNick', user_status='$userStatus' WHERE user_id='$userId'";

					$rsql = $mysqli -> query($query); 

					if($mysqli -> affected_rows == 1){
						$dataOk = true;
						$messageError = 'Se actualizó el registro';
						$content = queryUser($mysqli);

					}else{
						$dataOk = false;
						$messageError = 'No se pudo actualizar el registro';
					}

				break;

				case 'deleteUser':

					$userId = $_POST['user_id'];

					$query = "DELETE FROM user WHERE user_id=$userId LIMIT 1";

					$rsql = $mysqli -> query($query); 

					if($mysqli -> affected_rows == 1){
						$dataOk = true;
						$messageError = 'Se eliminó el registro';
						$content = queryUser($mysqli);

					}else{
						$dataOk = false;
						$messageError = 'No se pudo eliminar el registro';
					}

				break;				

				
				default:
					$messageError = 'Acción no disponible';
				break;
			}

		
		}else{
			$dataOk = false;
			$messageError = 'No se pudo ejecutar la app';

		}

	}else{
		$dataOk = false;
		$messageError = 'No se pudo conectar con la base de datos';
	}



	$json = [
		'answer' => $dataOk,
		'message' => $messageError,
		'data' => $content
	];

	echo json_encode($json);

?>