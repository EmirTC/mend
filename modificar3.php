<?php
	require_once ('db.php');

	$id=$_POST['identificador'];
    $title=$_POST['title'];
    $descr=$_POST['descr'];
    $image=$_POST['image'];
    $date=$_POST['date'];

    $sql = "UPDATE imagenes SET id='".$id."', title='".$title."', descripcion='".$descr."', image='".$image."', date='".$date."' WHERE id = '".$id."'";
    $res = mysql_query($sql);

    if($res){
        echo "Se modifico exitosamente";
        header ("Location: admin.php");
    }else{
        echo "No se pudo modificar";
        header ("Location: modificar.php");
    }
?>