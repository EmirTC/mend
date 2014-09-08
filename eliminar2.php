<?php
    require_once('db.php');
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
    <script type="text/javascript" src="js/funciones.js"></script>

</head>

<body onLoad="limpiar()">

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
                 <?php
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
                                        // mysql_close($con)
                                            ?>
                                </table>
                                <br/>
                                <button type="button" class="btn btn-success">Agregar</button> &nbsp;
                                <button type="button" class="btn btn-warning">Modificar</button> &nbsp;
                                <button type="button" class="btn btn-danger">Eliminar</button><br/><br/>
                            </center>
                        <?php
                    }else{
                        echo "No existen registros";
                    }
                    $codigo=$_POST['identificador'];
                    $sql = "SELECT * FROM imagenes WHERE id = '".$codigo."'";
                    $res = mysql_query($sql);

                    if ($res) {
                        $reg = mysql_fetch_assoc($res);

                        if ($reg) {
                        ?>
                        <center>
                            <form action="eliminar3.php" method="post" class="form-horizontal formu" role="form" name="form">
                                <table class="tablaCentrada" cellspacing="3" cellpadding="3">
                                    <tr>
                                        <td class="relleno gris">ID</td>
                                        <td class="relleno blanco">
                                            <input type="text" name="identificador" value="<?php echo $reg["id"]; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="relleno gris">Título</td>
                                        <td class="relleno blanco">
                                            <input type="text" name="title" value="<?php echo $reg["title"]; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="relleno gris">Descripción</td>
                                        <td class="relleno blanco">
                                            <input type="text" name="descr" value="<?php echo $reg["desc"]; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="relleno gris">Nombre de la Imagen</td>
                                        <td class="relleno blanco">
                                            <input type="text" name="image" value="<?php echo $reg["image"]; ?>" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="relleno gris">Fecha</td>
                                        <td class="relleno blanco">
                                            <input type="text" name="date" value="<?php echo $reg["date"]; ?>" readonly>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <button type="button" class="btn btn-danger botonGuardar" onClick="eliminar()">Eliminar Registro</button>
                            </form>
                        </center>
                        <?php
                        }else{
                            echo "El id: $codigo no existe!!";
                        }
                    }else{
                        echo "No existen registros!";
                    }
                ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-inverse navbar-static-bottom verde abajo" role="navigation">
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