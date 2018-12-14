<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php

	//ejemplo de insert
	//INSERT INTO `especificaciones`(`Nombre`,`Horas`, `Dificultad`, `IdUsuario`, `IdProyecto`) VALUES ('Proyecto1',20,'Dificil',1,2);
		session_start();
		//echo $_SESSION['Nombre'];
		//echo "$_GET['Nombre']";

		$con = mysqli_connect('localhost', 'admin','1234');
		mysqli_select_db($con, 'projecte_scrumb');
		$id_usuario= $_SESSION['Id'];
		$consulta = "select * from especificaciones where IdUsuario = $id_usuario";
		$resultat = mysqli_query($con, $consulta);
		
			while($registre = mysqli_fetch_assoc($resultat))
 				{
 					echo $registre["Nombre"]
 					.'<img onclick="posicionArriba()" src="img/flecha_arriba.svg" height="20">'."\t"
 					.'<img onclick="posicionAbajo()" src="img/flecha_arriba.svg" height="20">'."\t"
 					.'<img onclick="eliminarEspecificacion()" src="img/eliminar.png" height="20">';
 					echo "<br>";
 				}
	?>
	<script type="text/javascript">
		function eliminarEspecificacion(){
			alert("a");
		}
	</script>
</body>
</html>