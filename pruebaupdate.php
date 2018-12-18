<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php Session_start()?>
		
			<?php 
			echo $_SESSION['Grupo'];
			$Nombre = $_SESSION["Nombre"];
			$Grupo=$_SESSION['Grupo'];
	 		
	 			$conIn = mysqli_connect('localhost','admin','1234');
				mysqli_select_db($conIn, 'projecte_scrumb');
				$ConsultaSelect="SELECT id from proyecto where Nombre= '$Nombre'";
				$consultaIn2="Update grupos set IdProyecto =(SELECT id from proyecto where Nombre= '$Nombre') where Id = $Grupo";
				if( mysqli_query($conIn, $consultaIn2)){
					echo "Valores Actualizados";
				}
	 		?>
	 	
</body>
</html>