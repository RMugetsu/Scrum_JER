<!DOCTYPE html>
<html>
<head>
	<title>Mail de recuperacion</title>
</head>
<body>

	<?php 

		session_start();
		$con = mysqli_connect('localhost','admin','1234');
		mysqli_select_db($con, 'scrum');

		//mysql de prueba, insert:
		//INSERT INTO `usuario`(`Id`, `Nombre`, `Password`, `Tipo`, `IdGrupo`, `IdEspecifiacion`, `Email`) VALUES (NULL,'Jordi',SHA2('jordi123',512),1,0,0,'martinezmat.j@gmail.com')


		if (isset($_POST['email'])) {
			$email = $_POST['email'];
		    //Suponiendo que esta la base de datos.
		    $sql="select * from usuario WHERE Email = '$email'"; //Va obtener los datos y si no tiene nada pues no hace nada el programa.
		    $result=$con->query($sql);
		    $rows = $result->num_rows;
		    if($rows > 0) {
		        $row = $result->fetch_assoc();
		        $_SESSION['email_Admin'] = $row['Email'];
		        $msg = "Tu contraseña es: ".$row['Password'];
		        mail($row['Email'], "Mi titulo", $msg);
		   	}
		}
		// tutorial:
		//https://www.youtube.com/watch?v=aqLpV324eho
		
/*
		$smtp = Mail::factory('smtp',
		array ('host' => $host,
		   'port' => $port,
		   'auth' => true,
		   'username' => $username,
		   'password' => $password));

		$mail = $smtp->send($to, $headers, $body);

	    ini_set( 'display_errors', 1 );
	    error_reporting( E_ALL );
	    $from = "test@hostinger-tutorials.com";
	    $to = "test@gmail.com";
	    $subject = "Checking PHP mail";
	    $message = "PHP mail works just fine";
	    $headers = "From:" . $from;
	    mail($to,$subject,$message, $headers);
	    echo "The email message was sent.";
*/
	 ?>

</body>
</html>