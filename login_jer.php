<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript" src="script/script.js" defer></script>
	<meta charset="UTF-8">
	<title>Gestor de Proyectos SCRUMM</title>
</head>
<body>

	<?php


	session_start();

	if($_POST != null){
		$connection = mysqli_connect('localhost', 'admin','1234');
		mysqli_select_db($connection, 'projecte_scrumb');

		$nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		
		$consulta = "SELECT Nombre FROM usuario Where Nombre = '$nombre'";

		$resultado = mysqli_query($connection, $consulta);
		$num_row = mysqli_num_rows($resultado);


		if (!$resultado) {
			$message = 'Consulta invàlida: ' . mysqli_error() . "\n";
			die ($message);
		}

		
		if ($num_row == 1){
			$usuarioPassword = "SELECT Nombre, Password FROM usuario Where Nombre = '$nombre' AND Password = SHA2('$password', 512);";
			$checkUserPassword = mysqli_query($connection, $usuarioPassword);
			$num_row_password = mysqli_num_rows($checkUserPassword);

			if ($num_row_password == 1){
				$queryAll = "SELECT Id, Nombre, Tipo, IdGrupo, IdEspecifiacion  FROM usuario Where Nombre = '$nombre';";
				$infoUsuario = mysqli_query($connection, $queryAll);


				while ($registre = mysqli_fetch_assoc($infoUsuario)){
					$_SESSION['Id'] = $registre['Id'];
					$_SESSION['Nombre'] = $registre['Nombre'];
					$_SESSION['Tipo'] = $registre['Tipo'];
					$_SESSION['IdGrupo'] = $registre['IdGrupo'];
					$_SESSION['IdEspecifiacion'] = $registre['IdEspecifiacion'];
				}
				header('Location: index.php');
			}
			else{
				?>
				<script type="text/javascript">
					var error = "Contraseña Incorrecta";
					var Condicion = 1;
				</script>
				<?php
			}
		}
		else{
			?>
				<script type="text/javascript">
					var error = "Usuario Incorrecto";
					var Condicion = 1;
				</script>
				<?php
		}
	}

	 ?>
	<?php
		echo "<div id='error' style='display: none'></div>";
		echo "<form action='#' method='post'>";
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
		echo "<label style='float: right;'>
				<a class='pink-text' href='mail_recuperacion.php'><b>Olvidaste la contraseña?</b></a>
				</label><br><br>";
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
<script type="text/javascript">
	function generarError(error){
		if(Condicion==1){
			var divError = document.querySelector("div[id=error]");
			divError.style.display= "block";
			var mensaje = document.createElement("LABEL");
			var contenido = document.createTextNode(error);
			mensaje.setAttribute("for",error);
			var img = document.createElement("IMG");
			img.setAttribute("src","img/error.png");
			img.setAttribute("class","ImgError animacion");
			divError.appendChild(img);
			divError.appendChild(contenido);
		}
	
}
generarError(error);
</script>
</html>