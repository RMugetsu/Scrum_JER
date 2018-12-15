<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
  	<link rel="stylesheet" type="text/css" href="../css/recuperar.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../script/script.js" defer></script>
	<meta charset="UTF-8">
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
			?>
			<div class="section"></div>
			  <main>
			    <center>
			      <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
			      <div class="section"></div>
			      <div class="container">
			        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

			          <form class="col s12" method="post" action="nuevaPass.php">
			            <h5 class="indigo-text">La contraseña ha sido cambiada</h5>
			            <div class="section"></div>
			            <h6 class="indigo-text">Vuelve iniciar sesion <br>con tu nueva contraseña</h6>
			            <div class="section"></div>
			            <br />
			            <center>
			              <div class='row'>
			                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Siguiente</button>
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
			echo "$email <br>";
			echo "$nuevaPass <br>";
			echo "la contraseña ha sido actualizada <br>";

		}
		else{
			?>
			
			<div class="section"></div>
			  <main>
			    <center>
			      <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
			      <div class="section"></div>
			      <div class="container">
			        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

			          <form class="col s12" method="post" action="nuevaPass.php">
			            <h5 class="indigo-text">Recupera la contraseña</h5>
			            <div class="section"></div>
			            <h6 class="indigo-text">Inserte la nueva contraseña</h6>
			            <div class="section"></div>
			            <div class='row'>
			              <div class='input-field col s12'>
			                <input class='validate' type='password' name='nuevaPass' id='password' />
			                <label for='Password'>Password</label>
			              </div>
			            </div>
			            <br />
			            <center>
			              <div class='row'>
			                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Siguiente</button>
			              </div>
			            </center>
			          </form>
			        </div>
			      </div>
			    </center>

			    <div class="section"></div>
			    <div class="section"></div>
			  </main>
		<?php }?>

</body>
</html>