<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" type="text/css" href="../css/recuperar.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script type="text/javascript" src="../script/script.js" defer></script>
	<meta charset="UTF-8">
	<title>Recuperar Contraseña</title>
</head>
<body>


<body>
  
                <?php 

                  if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $con = mysqli_connect('localhost','admin','1234');
                    mysqli_select_db($con, 'projecte_scrumb');
                    $sql="select * from usuario WHERE Email = '$email'"; //Va obtener los datos y si no tiene nada pues no hace nada el programa.
                    $result=$con->query($sql); //realiza la consulta
                    $obtencion_datos = $result->fetch_assoc(); //obtiene los datos de la consulta
                    $obtencion_datos_para_pasar = $obtencion_datos["Id"];
                    $rows = $result->num_rows; //dice cuanto hay
                    if($rows > 0) {
                      ?>
                        <div class="section"></div>
                          <main>
                            <center>
                              <div class="section"></div>
                              <div class="section"></div>
                              <div class="section"></div>
                              <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
                              <div class="section"></div>
                              <div class="container">
                                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                                  <form class="col s12" action="../login_jer.php">
                                    <h5 class="red-text darken-4">Mail de recuperacion enviado!</h5>
                                    <div class="section"></div>
                                    <h6 class="red-text darken-4">Revisa tu buzon de entrada para <br>poder recuperar la contraseña</h6>
                                    <div class="section"></div>
                                    <div class='row'>
                                      <div class='input-field col s12'>
                                      </div>
                                    </div>

                                    <br />
                                    <center>
                                      <div class='row'>
                                        <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Volver</button>
                                      </div>
                                    </center>
                                  </form>
                                </div>
                              </div>
                            </center>

                            <div class="section"></div>
                            <div class="section"></div>
                          </main>
                      <?php 
                      
                      $titulo    = 'Recuperacion de contraseña de Scrum';
                      $mensaje   = 'Hola, utiliza el siguiente enlace para restaurar tu contraseña:
                      http://localhost/Scrum_JER/mail/nuevaPass.php?id='.$obtencion_datos_para_pasar;
                      $cabeceras = 'From: jmartinezmateos@iesesteveterradas.cat' . "\r\n" .
                          'Reply-To: jmartinezmateos@iesesteveterradas.cat' . "\r\n" .
                          'X-Mailer: PHP/' . phpversion();

                      mail($email, $titulo, $mensaje, $cabeceras);
                      echo "$titulo <br> $mensaje <br> $cabeceras <br>";
                    }
                    else{
                      ?>
                      <div class="section"></div>
                      <main>
                        <center>
                          <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
                          <div class="section"></div>
                          <div class="container">
                            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                              <form class="col s12" method="post" action="mail_recuperacion.php">
                                <h5 class="indigo-text">Recupera la contraseña</h5>
                                <div class="section"></div>
                                <h6 class="indigo-text">Introduce el mail para poder <br>recuperar la contraseña</h6>
                                <div class="section"></div>
                                <div class='row'>
                                  <div class='input-field col s12'>
                                    <i class="material-icons prefix">email</i>
                                    <input class='validate' type='email' name='email' id='email' />
                                    <label for='email'>Email</label>
                                    <?php 
                                      echo "<font size=2 style='color:red';>Este correo no existe</font>";
                                    ?>
                                  </div>
                                </div>
                                <br />
                                <center>
                                  <div class='row'>
                                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Siguiente</button>
                                  </div>
                                </center>
                              </form>
                            </div>
                          </div>
                          <a href="../login_jer.php">Volver atras</a>
                        </center>

                        <div class="section"></div>
                        <div class="section"></div>
                      </main>
                      <?php 

                    }
                  }
                  else{
                    ?>
                      <div class="section"></div>
                      <main>
                        <center>
                          <img class="responsive-img" style="width: 100px;" src="img/recuperar_contraseña.png" />
                          <div class="section"></div>
                          <div class="container">
                            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                              <form class="col s12" method="post" action="mail_recuperacion.php">
                                <h5 class="indigo-text">Recupera la contraseña</h5>
                                <div class="section"></div>
                                <h6 class="indigo-text">Introduce el mail para poder <br>recuperar la contraseña</h6>
                                <div class="section"></div>
                                <div class='row'>
                                  <div class='input-field col s12'>
                                    <i class="material-icons prefix">email</i>
                                    <input class='validate' type='email' name='email' id='email' />
                                    <label for='email'>Email</label>
                                  </div>
                                </div>

                                <br />
                                <center>
                                  <div class='row'>
                                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Siguiente</button>
                                  </div>
                                </center>
                              </form>
                            </div>
                          </div>
                          <a href="../login_jer.php">Volver atras</a>
                        </center>

                        <div class="section"></div>
                        <div class="section"></div>
                      </main>
                    <?php 
                  }
                 ?>
                

</body>

</body>
</html>