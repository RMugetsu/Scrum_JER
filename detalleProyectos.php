<!DOCTYPE html>
<html>
	<head>
		<title>Proyectos</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="js/script.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/especificaciones.css">
		<script type="text/javascript" src="script/script.js" defer></script>
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
			$nombre_proyecto = $_GET['proyect'];
			$consulta = "select e.Nombre from especificaciones e, proyecto p where '$nombre_proyecto' = p.Nombre and p.Id = e.IdProyecto" ;
			$resultat = mysqli_query($con, $consulta);

			echo "<ul class='collection with-header'>";
			echo '<li class="collection-header"> <h3 style="text-align:center">'.$_GET['proyect'].'</h3></li>';
			echo "</ul>";
			//Tiene que cerrar y volver a abrir porque hay un problema de 
			//compatibilidad de nuestro javascript con el materialize
			echo "<ul class='collection with-header'>";
			while($registre = mysqli_fetch_assoc($resultat)){
	 			echo "<li class='collection-item' id='listado_esp'>";
	 			echo $registre["Nombre"]
	 			.'<img class="secondary-content boton_eliminar" onclick="eliminarEspecificacion(this)" src="img/eliminar.png" height="25">'
	 			.'<img class="secondary-content flecha_abajo" onclick="posicionAbajo(this)" src="img/flecha_arriba.svg" height="25">'
	 			.'<img class="secondary-content flecha_arriba" onclick="posicionArriba(this)" src="img/flecha_arriba.svg" height="25">';		
	 			echo "</li>";
	 		}
	 		echo "</ul>";
	 		?>
	 		<input type="textfield" name="nueva_especificacion" id="nueva_especificacion">
	 		<a id="boton_nueva_especificacion" class="btn-floating btn-large waves-effect waves-light red" onclick="añadirEspecificacion()"><i class="material-icons">add</i></a>
	 		<div id="prueba"></div>

	</body>
</html>