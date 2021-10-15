<?php
    if(isset($_GET['id'])){
    include ('database.php');
    $materia = new Database();
    $id = intval ($_GET['id']);

    $res = $materia->borrarmateria($id);
    if($res){
        header('location: listado_materia.php');
    }
    else{
        echo "Error al eliminar el registro...!";
    }
}