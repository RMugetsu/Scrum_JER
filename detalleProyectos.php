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
			
			echo "<ul>";
			while($registre = mysqli_fetch_assoc($resultat))
 				{
 					echo "<li>";
 					echo $registre["Nombre"]
 					.'<img onclick="posicionArriba(element)" src="img/flecha_arriba.svg" height="50">'."\t"
 					.'<img onclick="posicionAbajo()" src="img/flecha_arriba.svg" height="50">'."\t"
 					.'<img onclick="eliminarEspecificacion(this)" src="img/eliminar.png" height="50">';
 					echo "</li>";
 				}
 			echo "</ul>";
	?>
	<script type="text/javascript">

		    function eliminarEspecificacion(element){
		    	var elemento_padre = element.parentNode;
		    	elemento_padre.parentNode.removeChild(elemento_padre);
		    	//removeChild(element);
		    }

		    function posicionArriba(){
		    	linea_a_mover=this;
		    	//alert(this);
		    	this.insertBefore(this);
		    	//this.parentNode.removeChild(this);
		    }
		
	</script>
</body>
</html>