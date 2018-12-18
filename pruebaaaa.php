<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
	<?php session_start()?>
		<form method="POST" action="pruebaupdate.php">
			
			<?php 
			$_SESSION['Nombre'] = $_POST["TextName"];
			$_SESSION['Numero'] = $_POST["TextSprint"];
			$_SESSION['Descripcion'] = $_POST["TextDescript"];
			$_SESSION['Owner'] = $_POST["Owner"];
			$_SESSION['Master'] = $_POST["Master"];
			$_SESSION['Grupo']=$_POST['Grupo'];

			$Nombre = $_POST["TextName"];
			$Numero = $_POST["TextSprint"];
			$Descripcion = $_POST["TextDescript"];
			$Owner = $_POST["Owner"];
			$Master = $_POST["Master"];
			$Grupo=$_POST['Grupo'];
		
	 		
	 			$conIn = mysqli_connect('localhost','admin','1234');
				mysqli_select_db($conIn, 'projecte_scrumb');
				$consultaIn="Insert into proyecto(Nombre,NumSprint,Descripcion,PO_Id,SM_Id) values('$Nombre','$Numero','$Descripcion','$Owner','$Master')";
				if( mysqli_query($conIn, $consultaIn)){
					echo "Valores insertados";
					echo "<br>";

				}		
	 		?>
	 		
	 			<input type="submit" value="pruebaupdate">
	 	</form>

</body>
</html>