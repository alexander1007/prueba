<?php include ("coneDB.php") ?>
<?php include ("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" 
                role="alert">
                <?= $_SESSION['message'] ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); } ?>
         <div class="card carbody">
                <form action="guardar_tarea.php" method="POST">
                    <div class="form-group">
                    <input type="text" name="titulo"
                    class= "form-control" 
                    placeholder="Titulo de la tarea" autofocus>
                    </div>
                    <div class="form-group">
                    <textarea name="descripcion" rows="2" class= "form-control"
                    placeholder="Descripcion de la tarea" autofocus></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name= "guardar_tarea" value="Guardar tarea">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class= "table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                       $query= "SELECT * FROM  tareas";
                       $lista_tareas = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($lista_tareas)){ ?>
                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['fecha_creacion'] ?></td>
                            <td>
                                <a href="editar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <span class="glyphicon glyphicon-star"></span></a> 
                                <a href="borrar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i></a>                       
                            </td>
                        
                        </tr>


                    <?php  } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php include ("includes/footer.php") ?>

 


