<!DOCTYPE html>
<html>
    <head>
        <title>Proyectos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="script/script_proyectos.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/especificaciones.css">
        <script type="text/javascript" src="script/script.js" defer></script>
    </head>
    <body>
       
        <?php

            session_start();
            //guardaremos la url para poder luego acceder al insertar un nuevo sprint
            $_SESSION['url'] = $_SERVER["REQUEST_URI"];  
            //y nos conectamos a la base de datos
            $con = mysqli_connect('localhost', 'admin','1234');
            mysqli_select_db($con, 'projecte_scrumb');
            $nombre_proyecto = $_GET['proyect'];
            $consulta = "select e.Nombre from especificaciones e, proyecto p where p.Id = e.IdProyecto AND e.IdSprint=NULL" ;
            $resultat = mysqli_query($con, $consulta);
           
           
            //Cabecera
            ?>
            <div id="cabecera">
                <div id="titulo">
                    <label>Vista de Proyectos</label>
                </div>
                <div id="usuario">
                    <img src="img/usuario.png" id="imgUsuario">
                    <?php echo "<label>Usuario: ".$_SESSION['Nombre']."</label>";?>
                </div>
                <div id="session">
                    <a href="logout.php"><img src="img/cerrar.png" id="imgCerrar"></a>
                </div>
            </div>
            <?php
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
                        <label>Product Owner: <?php echo $ProductOwner?></label><br>
                        <label>Scrum Master: <?php echo $ScrumMaster?></label>
                    </div>
                    <div class="col m6" id="info1">
                        <label>Número de Sprints: <?php echo $registre2['NumSprint']?></label><br>
                        <label>Descripción: </label><br>
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
            $consultaSpr = "SELECT s.Id, s.Inicio_Sprint, s.Final_Sprint, s.Horas_Disponibles, s.IdProyecto FROM proyecto p, sprints s WHERE p.Nombre='$nombre_proyecto' AND p.Id = s.IdProyecto";
            $resultatSpr = mysqli_query($con, $consultaSpr);
            echo "<div class='row'>";
            echo "<div class='col s12 m12'>";
            echo "<div class='row'>";
            echo "<div id='sprints' class='col s6 m6 info'>";
            echo "<ul id='ul_sprints' class='collapsible'>";
            if ($registreSpr = mysqli_fetch_assoc($resultatSpr)) {
                while($registreSpr = mysqli_fetch_assoc($resultatSpr)){
                    echo "<li>";
                    //fechas de inicio y fin metidas en strtotime para calcular tiempos
                    $fecha_inicio_sprint = strtotime($registreSpr['Inicio_Sprint']);
                    $fecha_final_sprint = strtotime($registreSpr['Final_Sprint']);
                    //guardo el id proyecto en una session para luego poder crear un insert y el id normal
                    $_SESSION['id_proyecto'] = $registreSpr['IdProyecto']; 
                    $_SESSION['id_sprint'] = $registreSpr['Id']+1; 
                    //if de colores
                    if ($fecha_actual >= $fecha_inicio_sprint && $fecha_actual < $fecha_final_sprint) {
                        echo "<div style='border:green 4px solid' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
                    }
                    //este tendria que ser negro?
                    else if ($fecha_actual < $fecha_inicio_sprint && $fecha_actual < $fecha_final_sprint) {
                        echo "<div style='border:black 4px solid' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
                    }
                    else if ($fecha_actual > $fecha_inicio_sprint && $fecha_actual >= $fecha_final_sprint) {
                        echo "<div style='border:gray 4px solid' class='collapsible-header'>Sprint".$registreSpr['Id']."</div>";
                    }
                    //Se crea el contenido del sprint
                      echo "<div class='collapsible-body'>";
                      echo "<p name='fecha_inicio'>Fecha Inicio:".$registreSpr['Inicio_Sprint']."</p>";
                      echo "<p name='fecha_fin'>Fecha Fin:".$registreSpr['Final_Sprint']."</p>";
                      echo "<table>";
                      $idSprint=$registreSpr['Id'];
                      $horas = 0;
                      $consultaSprs = "SELECT e.Nombre, e.Dificultad, e.Horas, u.Nombre as usuario FROM especificaciones e, usuario u  WHERE e.IdSprint= $idSprint AND e.IdUsuario= u.Id";
                    $resultatSprs = mysqli_query($con, $consultaSprs);
                    //Se muestran las especificaciones del sprint
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
                            echo "</tr>";
                            $horas += $registreSprs['Horas'];
                        }
                    echo 'Total horas: '.$horas.' / '.$registreSpr['Horas_Disponibles'];
                    echo "</table>";
                    echo "</div>";
                    echo "</li>";
                }
                echo "</ul>";
                echo "</div>";
                //Tiene que cerrar y volver a abrir porque hay un problema de
                //compatibilidad de nuestro javascript con el materialize
                echo "<div class='col s1 m1'>";
                echo "</div>";
            }
            else {
                echo "no hay esp";
            }
            
            echo "<div class='col s5 m5 info'>";
            echo "<ul id='lista_especificaciones' class='collection with-header'>";
            while($registre = mysqli_fetch_assoc($resultat)){
                 echo "<li class='collection-item' id='listado_esp'>";
                 if ($_SESSION['Tipo'] == 2) {
                     echo $registre["Nombre"]
                 .'<img class="secondary-content boton_eliminar" onclick="eliminarEspecificacion(this)" src="img/eliminar.png" height="25">'
                 .'<img class="secondary-content flecha_abajo" onclick="posicionAbajo(this)" src="img/flecha_arriba.svg" height="25">'
                 .'<img class="secondary-content flecha_arriba" onclick="posicionArriba(this)" src="img/flecha_arriba.svg" height="25">';       
                 }
                 else{
                    echo $registre["Nombre"];
                 }
                 echo "</li>";
                 
             }
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
             if ($_SESSION['Tipo'] == 2) {
             ?>
             <div id="div_añadir_especificaciones"></div>
            <?php } ?>
            
            <div id="nuevo_sprint"></div>
            <div class="row">
                <div class="col s11 m11"></div>
                <div class="col s1 m1"><img src="./img/flecha_arriba.svg" id="retroceder" onclick="paginaAnterior()"></div>
            </div>
    </body>
</html>