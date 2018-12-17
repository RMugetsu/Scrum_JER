<!DOCTYPE html>
<html>
	<head>
		<title>Proyectos</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="script/script_proyectos.js"></script>
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
			
			


			//Informacion del proyecto
			//Info General
			$consulta2 = "SELECT * FROM proyecto WHERE nombre='$nombre_proyecto'" ;
			$resultat2 = mysqli_query($con, $consulta2);
			//Info SM y PM
			$consultaPO = "SELECT u.Nombre as Nombre FROM proyecto p, usuario u WHERE p.Nombre='$nombre_proyecto' AND p.PO_Id = u.Id" ;
			$resultatPO = mysqli_query($con, $consultaPO);
			$consultaSM = "SELECT u.Nombre as Nombre FROM proyecto p, usuario u WHERE p.Nombre='$nombre_proyecto' AND p.SM_Id = u.Id" ;
			$resultatSM = mysqli_query($con, $consultaSM);
			while($registrePO = mysqli_fetch_assoc($resultatPO)){
				$ProductOwner = $registrePO['Nombre'];
			}
			while($registreSM = mysqli_fetch_assoc($resultatSM)){
				$ScrumMaster = $registreSM['Nombre'];
			}
			echo "<div class='container'>";
			echo "<div id='title'>";
			echo '<h3 style="text-align:center">'.$_GET['proyect'].'</h3>';
			echo "</div>";
			echo "<br>";
			//Div donde mostrar la informacion
			echo "<div class='row'>";
			echo "<div class='col s12 m12 info'>";
				while($registre2 = mysqli_fetch_assoc($resultat2)){
					?>
					<div class="col m6" >
						<label>Nombre del Proyecto: <?php echo $registre2['Nombre']?></label><br>
						<label>Product Owner: <?php echo $ProductOwner?></label><br>
						<label>Scrum Master: <?php echo $ScrumMaster?></label>
					</div>
					<div class="col m6" id="info1">
						<label>Número de Sprints: <?php echo $registre2['NumSprint']?></label><br>
						<label>Descripcion: </label><br>
						<textarea disabled><?php echo $registre2['Descripcion']?></textarea>
					</div>
					<?php
				}
			echo "</div>";
			echo "</div>";
			echo "<br>";

			//fecha actual:
			$fecha_actual = strtotime(date('y-m-d'));

			//Sprints del proyecto
			$consultaSpr = "SELECT s.Id, s.Inicio_Sprint, s.Final_Sprint FROM proyecto p, sprints s WHERE p.Nombre='$nombre_proyecto' AND p.Id = s.IdProyecto";
			$resultatSpr = mysqli_query($con, $consultaSpr);
			echo "<div class='col s12 m12 info'>";
			echo "<ul>";
			while($registreSpr = mysqli_fetch_assoc($resultatSpr)){
				echo "<li>";
				echo "<div>";
				//fechas de inicio y fin metidas en strtotime para calcular tiempos
				$fecha_inicio_sprint = strtotime($registreSpr['Inicio_Sprint']);
		    	$fecha_final_sprint = strtotime($registreSpr['Final_Sprint']);
		    	//if de colores
				if ($fecha_actual >= $fecha_inicio_sprint && $fecha_actual < $fecha_final_sprint) {
		    		echo "<div style='background-color:green' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
		    	}
		    	//este tendria que ser negro?
		    	else if ($fecha_actual < $fecha_inicio_sprint && $fecha_actual < $fecha_final_sprint) {
		    		echo "<div style='background-color:red' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
		    	}
		    	else if ($fecha_actual > $fecha_inicio_sprint && $fecha_actual >= $fecha_final_sprint) {
		    		echo "<div style='background-color:grey' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
		    	}
		    	//esto era class='collapsible-body'
      			echo "<div class='collection-item'>";
      			echo "<p>Fecha Inicio:".$registreSpr['Inicio_Sprint']."</p>";
      			echo "<p>Fecha Fin:".$registreSpr['Final_Sprint']."</p>";
      			echo "<table>";
      			$idSprint=$registreSpr['Id'];
      			$horas = 0;
      			$consultaSprs = "SELECT e.Nombre, e.Dificultad, e.Horas, u.Nombre as usuario FROM especificaciones e, usuario u  WHERE e.IdSprint= $idSprint AND e.IdUsuario= u.Id";
				$resultatSprs = mysqli_query($con, $consultaSprs);
					while($registreSprs = mysqli_fetch_assoc($resultatSprs)){
						echo "<tr>";
							echo "<td> ".$registreSprs['Nombre'];
							echo "</td>";
							echo "<td> ".$registreSprs['Dificultad'];
							echo "</td>";
							echo "<td> ".$registreSprs['Horas'];
							echo "</td>";
							echo "<td> ".$registreSprs['usuario'];
							echo "</td>";
						echo "</tr";
						$horas += $registreSprs['Horas'];
					}
				echo $horas;
				echo "</table>";
      			echo "</div>";
				echo "</div>";
				echo "</li>";
			}
			echo "</ul>";
			echo "</div>";
			echo "<br>";
			//Tiene que cerrar y volver a abrir porque hay un problema de 
			//compatibilidad de nuestro javascript con el materialize
			echo "<div class='col s12 m12 info'>";
			echo "<ul id='lista_especificaciones' class='collection with-header'>";
			while($registre = mysqli_fetch_assoc($resultat)){
	 			echo "<li class='collection-item' id='listado_esp'>";
	 			echo $registre["Nombre"]
	 			.'<img class="secondary-content boton_eliminar" onclick="eliminarEspecificacion(this)" src="img/eliminar.png" height="25">'
	 			.'<img class="secondary-content flecha_abajo" onclick="posicionAbajo(this)" src="img/flecha_arriba.svg" height="25">'
	 			.'<img class="secondary-content flecha_arriba" onclick="posicionArriba(this)" src="img/flecha_arriba.svg" height="25">';		
	 			echo "</li>";
	 		}
	 		echo "</ul>";
	 		echo "</div>";
	 		?>
	 		<div id="div_añadir_especificaciones"></div>
	 		</div>
	 		

	</body>
</html>