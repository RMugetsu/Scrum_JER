<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>

		<?php 
			session_start();

			$con = mysqli_connect('localhost', 'admin','1234');
            mysqli_select_db($con, 'projecte_scrumb');
            $id = $_SESSION['id_sprint'];
            $id_proyecto = $_SESSION['id_proyecto'];
            $nueva_fecha_inicio = $_POST["nueva_fecha_inicio"];
            $nueva_fecha_fin = $_POST["nueva_fecha_fin"];
            $nueva_horas_disponibles = $_POST["nueva_horas_disponibles"];

            $pagina_proyectos = $_SESSION['url'];

			mysqli_query($con,"INSERT into sprints VALUES ($id, $id_proyecto, '$nueva_fecha_inicio', '$nueva_fecha_fin', '', $nueva_horas_disponibles)");
			mysqli_close($con);
			header("Location:$pagina_proyectos");
		 ?>

	</body>
</html>