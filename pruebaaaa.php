<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
			
			<?php 
			$Nombre = $_POST["TextName"]
			$Numero = $_POST["TextSprint"];
			$Descripcion = $_POST["TextDescript"];
			$Owner = $_POST["Owner"];
			$Master = $_POST["Master"];
	 		
	 			$conIn = mysqli_connect('localhost','admin','1234');
				mysqli_select_db($conIn, 'projecte_scrumb');
				$consultaIn="Insert into proyecto(Nombre,NumSprint,Descripcion,PO_Id,SM_Id) values('$Nombre',$Numero','$Descripción','$Owner','$Master')";
				if( mysqli_query($conIn, $consultaIn)){
					echo "Valores insertados";
				}
	 		?>
</body>
</html>