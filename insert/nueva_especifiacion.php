<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 

			$con = mysqli_connect('localhost', 'admin','1234');
            mysqli_select_db($con, 'projecte_scrumb');

            $especificacion_a_insertar = $_POST["especificacion_bbdd"];

            $id_proyecto = $_POST['id_proyecto'];

            $pagina_proyectos = $_POST['url'];

            $array_especificacion_a_insertar=explode(",",$especificacion_a_insertar);

            foreach ($array_especificacion_a_insertar as $key => $value) {
            	mysqli_query($con,"INSERT into especificaciones VALUES (null, '$value', null, null, null, null, null, $id_proyecto)");
            }
            mysqli_close($con);
            var_dump($id_proyecto);
			header("Location:$pagina_proyectos");
		 ?>
		 
</body>
</html>