<?php
    require_once ('db.php');

    $id=$_POST['identificador'];
    $title=$_POST['title'];
    $descr=$_POST['descr'];
    $image=$_POST['image'];
    $tiempo = date('Y-m-d');

    $sql = "INSERT INTO imagenes(id, title, descripcion, image, date) VALUES (NULL, '".$title."', '".$descr."', '".$image."', '".$tiempo."')";
    $res = mysql_query($sql);

    if($res){
       echo "La imagen ha sido agregada exitosamente!";
       header ("Location: admin.php");
    }else{
       echo "No se pudo agregar!";
       header ("Location: agregar.php");
    }
?>