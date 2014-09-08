<?php


	define('server','localhost');
	define('user','root');
	define('password','');
	define('database','users');

	$errorDb = false;

	function queryUser($linkDb){

		$data = '';

		$query = "SELECT * FROM user ORDER BY user_name ASC";

		$rsql = $linkDb -> query($query);

		$numberRows = $rsql -> num_rows;

		if($numberRows!=0){
			while($register = $rsql -> fetch_assoc()){

				$data .= '

					<tr>
						<td>'.$register['user_name'].'</td>
						<td>'.$register['user_position'].'</td>
						<td>'.$register['user_nick'].'</td>
						<td>'.$register['user_status'].'</td>
						<td><button class="btn btn-block btn-warning">Edit</button></td>
					</tr>

				';
			}

		}else{
			$data = '
					<tr>
						<td colspan="5">Not Data</td>
					</tr>
			';
		}

		return $data;

	}

	if(defined('server') && defined('user') && defined('password') && defined('database')){

		$mysqli = new mysqli(server, user, password, database);

		if(mysqli_connect_error()) $errorDb = true;

		$mysqli -> query("SET NAMES 'utf8'");


	}
	
	
?>