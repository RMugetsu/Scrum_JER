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

            $especificacion_a_insertar = $_POST["especificacion_bbdd"];
            $id_proyecto = $_SESSION['id_proyecto'];

            $pagina_proyectos = $_SESSION['url'];

			mysqli_query($con,"INSERT into especificaciones VALUES (null, '$especificacion_a_insertar', null, null, null, null, null, $id_proyecto)");
			mysqli_close($con);
			
			header("Location:$pagina_proyectos");

		 ?>
</body>
</html>