<?php
	
	sleep(5);
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

					if($rsql==true){
						$dataOk = true;
						$messageError = 'Se insertaron los valores';
						$content = '<tr>
										<td>'.$_POST['user_name'].'</td>
										<td>'.$_POST['user_position'].'</td>
										<td>'.$_POST['user_nick'].'</td>
										<td>'.$_POST['user_status'].'</td>
										<td><button class="btn btn-block btn-warning">Edit</button></td>
									</tr>
						';

					}else{
						$dataOk = false;
						$messageError = 'No se pudieron guardar los valores en la db';
					}

				break;
				
				default:
					$messageError = 'Acción no disponible';
				break;
			}

			$userName 		= $_POST['user_name'];
			$userPosition	= $_POST['user_position'];
		
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