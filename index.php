<?php

	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

	include('php/mainFunctions.php');

	if($errorDb!=true){

		$queryUser = queryUser($mysqli);

	}else{

		$queryUser = '
				<tr>
					<td colspan="5">Error to connect database</td>
				</tr>
		';
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>App Jquery Ajax PHP & MYSQL</title>

		<link rel="stylesheet" href="/stylesheet/all.css">

		<link rel="stylesheet" href="/stylesheet/bootstrap-theme.min.css">
		<link rel="stylesheet" href="/stylesheet/bootstrap.min.css">

		<link rel="stylesheet" href="/stylesheet/jquery-ui.min.css">
		<link rel="stylesheet" href="/stylesheet/jquery-ui.theme.min.css">
		
		<!--Loader-->
		<link rel="stylesheet" href="http://css-spinners.com/css/spinner/dots.css" type="text/css">


		<!--<script src="js/vendor/jquery.metadata.min.js"></script>-->
		<script src="js/vendor/jquery-1.11.0.min.js"></script>
		<script src="js/vendor/jquery.validate.min.js"></script>
		<script src="js/vendor/jquery-ui.js"></script>
		<script src="js/vendor/messages_es_AR.js"></script>
		<script src="js/main.js"></script>

	</head>

	<body>


		<div class="containerPage">
			
			<header class="navbar-inverse">
				<div class="container">
					<h1>
						App Jquery, Jquery UI, Bootstrap, $.Ajax, PHP Y MYSQL
					</h1>
				</div>
			</header>

			<div class="mainContent">
				
				<!--.container-->
				<div class="container">

					<button class="js-addUser btn-block btn btn-primary btn-large">Add User</button>

					<table id="insert" class="table table-bordered table-striped">
						<colgroup>
							<col class="span1">
							<col class="span7">
						</colgroup>
						<thead>
							<tr>
								<th>Name</th>
								<th>Position</th>
								<th>Nick</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							
							<?= $queryUser; ?>
							
						</tbody>
					</table>
					
					<div class="fullScreen">

						<div class="boxDots">
							
							<div class="dots ">
								Loading...
							</div>

						</div>
						
					</div>

				</div><!--.container-->
				
			</div>

			<?php include('php/form.php'); ?>

			<footer>
				<div class="container">
					<h2>footer</h2>
				</div>
			</footer>
			

		</div>

	</body>

</html>