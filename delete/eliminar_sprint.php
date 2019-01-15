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

            $sprint_a_eliminar = $_POST["numero_a_eliminar"];

            $pagina_proyectos = $_SESSION['url'];

			mysqli_query($con,"DELETE from sprints WHERE NumeroSprint=$sprint_a_eliminar");


			$quitar_idSprint_a_la_especificacion = "UPDATE especificaciones SET IdSprint = null where IdSprint = $sprint_a_eliminar";
            $especificacion_en_null = mysqli_query($con, $quitar_idSprint_a_la_especificacion);

			mysqli_close($con);
			header("Location:$pagina_proyectos");

		 ?>
</body>
</html>