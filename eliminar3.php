<?php
	require_once ('db.php');

	$id=$_POST['identificador'];
    $title=$_POST['title'];
    $descr=$_POST['descr'];
    $image=$_POST['image'];
    $date=$_POST['date'];

    $sql = "DELETE FROM imagenes WHERE id = '".$id."'";
    $res = mysql_query($sql);

    if($res){
        echo "Se elimino exitosamente";
        header ("Location: admin.php");
    }else{
        echo "No se pudo eliminar";
        header ("Location: eliminar.php");
    }
?>