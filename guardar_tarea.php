<?php

include ("coneDB.php");

if (isset($_POST ['guardar_tarea'])){
   $titulo= $_POST['titulo'];
   $descricpion= $_POST['descripcion'];

   $query= "INSERT INTO tareas(titulo, descripcion) 
   VALUES('$titulo', '$descricpion')";
   $result= mysqli_query($conn, $query);

   if(!$result){
       die("Fallo la consulta");
   }

  $_SESSION['message'] = 'Tarea guardada exitosamente';
  $_SESSION['message_type'] ='success';
  header ("Location: index.php");
}
?>