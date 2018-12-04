<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<meta charset="UTF-8">
	<title>Gestor de Proyectos SCRUMM</title>
</head>
<body>



	<?php

		$connection = mysqli_connect('localhost', 'jose','jose123');

		mysqli_select_db($connection, 'project');

		$consulta = "SELECT Nombre, Password FROM usuario Where Nombre = ;";

		$resultado = mysqli_query($connection, $consulta);


		$nombre = $_POST['nombre'];
		$password = $_POST['password'];



	 ?>

	<?php 
		echo "<form action='connection.php method='post'>";
		echo "<div class='row'>";
		echo "<div class='col s12 m4 offset-m4'>";
		echo "<div class='card'>";
		echo "<div class='card-action green lighten-1 white-text'>";
		echo "<h3 style='text-align:center'>SCRUM JER</h3>";
		echo "</div>";
		echo "<div class='card-content'></div>";
		echo "<div class='form-field'>";
		echo "<label for='username'>Username</label>";
		echo "<input type='text' name='nombre'>";
		echo "</div><br>";
		echo "<div class='form-field'>";
		echo "<label for='password'>Contraseña</label>";
		echo "<input type='password' name='password'>";
		echo "</div><br>";
		echo "<div class='form-field'>";
		echo "<button class='btn btn-large' style='width:100%;'>LOG IN</button>";
		echo "</div><br>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</form>";


	 ?>
	
</body>
</html>