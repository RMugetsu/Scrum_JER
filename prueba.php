<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con, 'test');
		$consulta = "SELECT Id, Nombre, Num_Sprints as Sprints, PO_Id as PO, SM_Id as SM FROM proyectos";
		$resultat = mysqli_query($con, $consulta);
			while($registre = mysqli_fetch_assoc($resultat))
 				{

 				}
 			?>
</body>
</html>