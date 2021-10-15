<?php include ('../header/header.php'); ?>
<center><h4>Listado de Materias</h4></center>
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID MATERIA</th>
                <th>NOMBRE DE MATERIA</th>
                <th>DESCRIPCION DE MATERIA</th>
                <th>FECHA DE REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
            <?php
                include ('database.php');
                $campus = new Database();
                $listadocampus = $campus->listadocampus();
            ?>
            <tbody>
                <?php
                    while($row = mysqli_fetch_object($listadocampus)){
                        $eCodMateria = $row->eCodCampus; 
                        $tNombreMateria = $row->tNombreCampus; 
                        $tDescripcionMateria = $row->tDescripcionmateria; 
                        $fFechaRegistroMateria = $row->$fFechaRegistroMateria; 
                    
                ?>
                <tr>
                    <td><?php echo $eCodMateria; ?></td>
                    <td><?php echo $tNombreMateria?></td>
                    <td><?php echo $tDescripcionMateria?></td>
                    <td><?php echo $fFechaRegistroMateria; ?></td>
                    <td>
                        <a href="editarcampus.php?id=<?php echo $eCodMateria; ?>" class="edit btn btn-warning" title="Editar" data-toogle="tooltip"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="borrar_campus.php?id=<?php echo $eCodMateria ?>" class="delete btn btn-danger" title ="Eliminar" data-toogle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                         </td>
                </tr>
                <?php
                    }
                    ?>

        </table>
</div>



<?php include('../footer/footer.php'); ?>