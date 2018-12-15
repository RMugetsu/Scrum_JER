<!DOCTYPE html>
<html>
<head>
	<title>Recuperar contraseña</title>
</head>
<body>
	

	
	<?php 
		session_start();
		$con = mysqli_connect('localhost','admin','1234');
		mysqli_select_db($con, 'projecte_scrumb');

		$email = $_SESSION['email'];

		if (isset($_POST['nuevaPass'])) {

			$nuevaPass = $_POST['nuevaPass'];

			$sql = "UPDATE `usuario` SET `Password`=SHA2('$nuevaPass',512) WHERE `Email`='martinezmat.j@gmail.com'";
			$con->query($sql);
			echo "$email <br>";
			echo "$nuevaPass <br>";
			echo "la contraseña ha sido actualizada <br>";
		}
		else{
			echo '
			<form method="post"	action="nuevaPass.php">
				<input type="text" name="nuevaPass" required>
				<label>introduce nueva contraseña</label>
				<input type="submit">
			</form>
			';
		}

	 ?>

</body>
</html>