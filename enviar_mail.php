<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css">
  	<link rel="stylesheet" type="text/css" href="css/recuperar.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="script/script.js" defer></script>
	<meta charset="UTF-8">
	<title>Mail de recuperacion</title>
</head>
<body>

	<div class="section"></div>
  <main>
    <center>
      <div class="section"></div>
      <div class="section"></div>
      <div class="section"></div>
      <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
      <div class="section"></div>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" action="login_jer.php">
            <h5 class="red-text darken-4">Mail de recuperacion enviado!</h5>
            <div class="section"></div>
            <h6 class="red-text darken-4">Revisa tu buzon de entrada para <br>poder recuperar la contraseña</h6>
            <div class="section"></div>
            <div class='row'>
              <div class='input-field col s12'>
              </div>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Volver</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>


	<?php 

		///////////////////////////// PRUEBAS ////////////////////////////////////////

		session_start();
		$con = mysqli_connect('localhost','admin','1234');
		mysqli_select_db($con, 'scrum');
		session_destroy(); 

		//mysql de prueba, insert:
		//INSERT INTO `usuario`(`Id`, `Nombre`, `Password`, `Tipo`, `IdGrupo`, `IdEspecifiacion`, `Email`) VALUES (NULL,'Jordi',SHA2('jordi123',512),1,0,0,'martinezmat.j@gmail.com')


		if (isset($_SESSION['email'])) {
			$email = $_SESSION['email'];
		    //Suponiendo que esta la base de datos.
		    $sql="select * from usuario WHERE Email = '$email'"; //Va obtener los datos y si no tiene nada pues no hace nada el programa.
		    $result=$con->query($sql);
		    $rows = $result->num_rows;
		    if($rows > 0) {
		        $row = $result->fetch_assoc();
		        $_SESSION['email_Admin'] = $row['Email'];
		        $msg = "Tu contraseña es: ".$row['Password'];
		        echo $row['Email'];
		        //mail($row['Email'], "Mi titulo", $msg);
		   	}
		   	else{
		   		echo "No existe";
		   	}
		}
		/////////////////////////////////// acordeon:
		/////////////////////////////////// https://codepen.io/ionic/pen/uJkCz
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