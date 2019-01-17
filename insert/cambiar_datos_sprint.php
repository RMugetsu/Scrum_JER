<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>

		<?php 

			$con = mysqli_connect('localhost', 'admin','1234');
            mysqli_select_db($con, 'projecte_scrumb');
            $NumeroSprint = $_POST['id_sprint'];
            $id_proyecto = $_POST['id_proyecto'];
            $nueva_fecha_inicio = $_POST["fecha_inicial_a_cambiar"];
            $nueva_fecha_fin = $_POST["fecha_fin_a_cambiar"];
            $nueva_horas_disponibles = $_POST["numero_horas_totales_a_cambiar"];

            $pagina_proyectos = $_POST['url'];

            $quitar_idSprint_a_la_especificacion = "UPDATE sprints SET Inicio_Sprint = '$nueva_fecha_inicio', Final_Sprint = '$nueva_fecha_fin', Horas_Disponibles = $nueva_horas_disponibles where IdProyecto = $id_proyecto AND NumeroSprint = $NumeroSprint";
            $especificacion_en_null = mysqli_query($con, $quitar_idSprint_a_la_especificacion);
			mysqli_close($con);
			header("Location:$pagina_proyectos");
		 ?>

	</body>
</html>