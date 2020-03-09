<?php

include ("coneDB.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM tareas WHERE id=$id";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado){
        die("No se pudo eliminar la tarea");
    }

    $_SESSION['message']= 'La tarea se elimino satisfactoriamente';
    $_SESSION['message_type']= 'danger';
    header("Location: index.php");

}

?>