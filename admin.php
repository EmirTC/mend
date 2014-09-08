<?php
    session_start();

    if (!isset($_SESSION['sess_user'])) {
        header("location:acceso.php");
    }

    else{
?>

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
                <a class="navbar-brand" href="#"><?=$_SESSION['sess_user'];?></a>
                <a class="navbar-brand" href="#">&nbsp;</a>
                <a class="navbar-brand" href="logout.php"> Cerrar Sessión </a>
                <img src="ima/mend.png" alt="Logotipo MEND">
            </div>
        </div>
    </nav>

    <div class="clearfix">
        <br/><br/><br/><br/>
    </div>

    <div class="section_area">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Administrador de Imágenes</h2>
                <br/><br/>
                 <?php
                    require_once('db.php');

                    //enviando consulta a db
                    $sql = "SELECT * FROM imagenes ORDER BY id";
                    $res = mysql_query($sql);

                    //pregunta si el resultado de la consulta tiene registros
                    if($res){
                        ?>
                            <center>
                                <table class="text-center" border="2" cellpadding="3" cellspacing="3" width="800px">
                                    <tr>
                                        <th colspan="5">Listado de Imagenes</th>
                                    </tr>
                                    <tr>
                                        <td align="center"><strong>ID</strong></td>
                                        <td align="center"><strong>Titulo</strong></td>
                                        <td align="center"><strong>Descripción</strong></td>
                                        <td align="center"><strong>Imagen</strong></td>
                                        <td align="center"><strong>Fecha</strong></td>
                                    </tr>
                                    <?php
                                        //creando bucle para mostrar imagenes
                                        $n=0;
                                        while ($reg=mysql_fetch_row($res)) {
                                            //muestra los datos de cada fila como matriz
                                            ?>
                                            <tr>
                                                <td><?php echo "$reg[0]";?></td>
                                                <td><?php echo "$reg[1]";?></td>
                                                <td><?php echo "$reg[2]";?></td>
                                                <td><?php echo "$reg[3]";?></td>
                                                <td><?php echo "$reg[4]";?></td>
                                            </tr>
                                            <?php
                                        }
                                        mysql_close($con)
                                            ?>
                                </table>
                                <br/>
                                <a href="agregar.php" type="button" class="btn btn-success">Agregar</a>
                                <a href="modificar.php" type="button" class="btn btn-warning">Modificar</a>
                                <a href="eliminar.php" type="button" class="btn btn-danger">Eliminar</a>
                            </center>
                        <?php
                    }else{
                        echo "No existen registros";
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

<?php

    }

?>