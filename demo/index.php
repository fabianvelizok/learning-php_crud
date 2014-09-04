<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>AJAX</title>
	<link rel="stylesheet" href="stylesheet/all.css">
	<!--<link rel="stylesheet" href="stylesheet/all.css">-->
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<div class="containerPage">
		
		<form method="POST" action="data.php" id="ajaxForm">

			<div class="field">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" required>
			</div>		

			<div class="field">
				<label for="emai">Email</label>
				<input type="text" id="email" name="email" required>
			</div>		

			<div class="field">
				<input type="submit" id="submitForm" value="Submit">
			</div>

		</form>

	</div>

</body>
</html>