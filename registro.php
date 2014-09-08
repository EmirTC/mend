<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Andrés Emir Torres Cervera, MEND">

    <title>Tablero de anuncios digital</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/full-slider.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-static-top navbar-inverse verde" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">MEND</a>
            </div>
            <div class="derecha">
                <a class="navbar-brand" href="#">Tablero de Anuncios Digital</a>
                <img src="ima/mend.png" alt="Logotipo MEND">
            </div>
        </div>
    </nav>

    <div class="clearfix">
        <br/><br/><br/><br/>
    </div>

    <div class="section_area principal">
        <div class="container">
            <div class="row">
                <figure class="text-center">
                    <img src="ima/logo_mend.png" alt="">
                    <br/><br/>
                </figure>
                <h3 class="text-center">Registro</h3>
                <form action="registro.php" method="post" class="form-horizontal formu" role="form" name="form">
                  <div class="form-group">
                    <label for="user" class="col-sm-4 control-label">Usuario</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="user" name="user" placeholder="Usuario">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="col-sm-4 control-label">Contraseña</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="submit" class="btn btn-default entrar">Registrar</button>
                    </div>
                  </div>
                </form>
                <?php
                    if(isset($_POST["submit"])){
                        $user=$_POST['user'];
                        $pass=$_POST['pass'];

                        $con = mysql_connect('localhost', 'root', 'mysql') or die (mysql_error());
                        mysql_select_db('mend') or die ("No se pudo conectar a la base de datos");

                        $query = mysql_query("SELECT * FROM login WHERE username='".$user."'");
                        $numrows = mysql_num_rows($query);

                        if($numrows==0){
                            $sql= "INSERT INTO login(username,password) VALUES('$user','$pass')";

                            $result = mysql_query($sql);

                            if ($result) {
                                echo "Cuenta creada con éxito";
                                header ("Location: acceso.php");
                            }

                            else{
                                echo "No se pudo crear tu cuenta. :(";
                            }
                        }

                        else{
                            echo "Ese nombre de usuario ya existe favor de ingresar otro.";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-bottom verde" role="navigation">
        <div class="container text-center">
            <p>Copyright &copy; MEND 2014</p>
        </div>
    </nav>

    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>