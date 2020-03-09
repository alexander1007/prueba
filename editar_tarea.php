<?php

include("coneDB.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query = "SELECT * FROM tareas WHERE  id=$id";
    $resultado = mysqli_query($conn, $query);
    if(mysqli_num_rows($resultado)==1){
        $row =mysqli_fetch_array($resultado);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
      }
}

if(isset($_POST['actualizar'])){
    $id=$_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tareas set titulo= '$titulo', descripcion= '$descripcion' WHERE id=$id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'La tarea fue actualizada';
    $_SESSION['message_type'] ='info';
    header("Location: index.php");
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                    <input type="text" name="titulo" value="<?php echo $titulo;?>" class="form-control"
                    placeholder= "Actualizar titulo">                
                    </div>
                    <div class="form-group">
                    <textarea name="descripcion" rows="2" class ="form-control"
                     placeholder= "Actualizar descripcion de tarea"><?php echo $descripcion?></textarea>
                    </div>
                    <button class = "btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
        </div>      
    </div>
</div>




<?php include("includes/footer.php") ?>