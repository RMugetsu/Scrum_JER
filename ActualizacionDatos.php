<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php Session_start()?>
		
			<?php 
			echo $_SESSION['Grupo'];
			$Nombrep = $_SESSION["Nombrep"];
			$Grupo=$_SESSION['Grupo'];
	 		
	 			$conIn = mysqli_connect('localhost','admin','1234');
				mysqli_select_db($conIn, 'projecte_scrumb');
				$ConsultaSelect="SELECT id from proyecto where Nombre= '$Nombrep'";
				$consultaIn2="Update grupos set IdProyecto =(SELECT id from proyecto where Nombre= '$Nombrep') where Id = $Grupo";
				if( mysqli_query($conIn, $consultaIn2)){
					echo "Valores Actualizados";
				}
				Header( "Location: index.php" );	
	 		?>
	 	
</body>
</html>