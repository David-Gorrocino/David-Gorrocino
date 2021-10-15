<?php include ('../header/header.php'); ?>

<?php
    if (isset($_GET['id'])){
        $id = intval($_GET['id']);
    }
    else
    {
        header("location: index.php");
    }
?>

<?php
    include ('database.php');
    $informacionmateria = new Database();
    if (isset($_POST) && !empty($_POST)){
        $tNombreMateria = $materia->sanitize($_POST['tNombreMateria']);
    
        $tDescripcionMateria = $materia->sanitize($_POST['tDescripcionMateria']);
        $eCodMateria = intval($_POST['eCodMateria']);

        $res= $informacionmateria->actualizarmateria($tNombremateria,$tDescripcionMateria);
        if($res){
            $message = "Datos actualizados con éxito";
            $class="alert alert-success";
        }
        else{
            $message ="No se pudieron actualizar los datos";
            $class="alert alert-danger";
        }
        ?>
        <div class="<?php echo $class ?>">
            <?php echo $message; ?>
        </div>
       <?php
    }
    $datos_materia = $informacionmateria->leerunsolomateria($id);
?>

<form method="post"> <!-- form es la etiqueta de apertura y cierre del formulario de la página web -->
    <div class="container"> <!-- Contenedor para establecer el ancho del diseño -->
    <div class="row"> <!--Dividir la pantalla en filas -->
        <input type="hidden" name="eCodMateria" id="eCodMateria" class="form-control" value="<?php echo $datos_campus->eCodCampus; ?>">
        <div class="col-md-2"> <!--Asigna el ancho en este caso 3/12-->
            <label>Materia(s)</label> <!-- Mostrar información -->
            <input type="text" name="tNombreMateria" id="tNombreMateria" class='form-control' required> <!--type define el tipo de elemento HTML-->
        </div> <!-- div es la etiqueta común utilizada para crear un contenedor genérico-->
        <div class="col-md-6x"> <!-- 3/12-->
            <label>Descripcion</label> <!-- Label se usa para definir el nombre o título de un control del formulario-->
            <textarea name="tDescripcionMateria" rows="2" cols="20" id="tDescripcionMateria" class='form-control' required></textarea>
        </div> 
</div>
<div class="col-md-12 pull-rigth">
    <br /> <!-- Es la etiqueta utilizada para crear un salto de línea-->
    <center> <!--Alinear al centro-->
        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true">&nbsp;Guardar Campus</i></button> <!-- El button se utiliza para representar un botón en el formulario-->
    </center>
    </div>
    </div>
</form>
<?php include('../footer/footer.php'); ?> <!-- include es para incluir y footer es para definir el pie de página es por eso que se incluye el pie de página de footer.php-->
