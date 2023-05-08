<?php
include('../conexion.php');

$id=$_GET['id'];
// ABRIMOS LA CONEXION A LA BD MYSQL
$conexion = conectar();

// TRAEMOS LOS DATOS DE LA TABLA ALUMNOS Y DE EL ALUMNO QUE DESEAMOS EDITAR
$sql = "SELECT * FROM alumno WHERE alumno_id='$id' ";


// EJECUTAMOS LA INSTRUCCION SQL
$resultado = mysqli_query($conexion,$sql);

//BUCLE PARA RECORRER Y MOSTRAR TODOS LOS DATOS DEL ALUMNO SELECCIONADO
    while($alum=mysqli_fetch_assoc($resultado)){


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .container {
    width: 50%;
    margin-top: 100px;

}

    </style>
    <title>Editar Alumno</title>
</head>
<body>
    <div class="container">
		<div class="card">
            <div class="card-header">
    <h1 class="text-center">Alumno</h1>
            </div>
    <div class="card-body">
        <form name="formAlumno" method="post" action="editar_alumno.php">
        <input type="text" class="form-control" value="<?php echo $alum['alumno_id'] ?>"  name="alumno_id" >
            <div class="form-group">
                <label>Nombres:</label>
                <input type="text" class="form-control" value="<?php echo $alum['nombres'] ?>" placeholder="Nombre del usuario" name="nombres" >
            </div>
            <div class="form-group">
                <label>Apellido Paterno:</label>
                <input type="text" class="form-control" value="<?php echo $alum['ape_paterno'] ?>" placeholder="Apellido Paterno" name="ape_paterno" >
            </div>
            <div class="form-group">
                <label>Apellido Materno:</label>
                <input type="text" class="form-control" value="<?php echo $alum['ape_materno'] ?>" placeholder="Apellido Materno"  name="ape_materno" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Editar</button>

        </form>
        <br>
        <div>
            <a href="../alumno/alumnos.php" class="btn btn-primary">Volver a Inicio</a>
        </div>
        <?php
   
}
 ?>             
</div>
</div>
</div>
</div>
</body>
</html>
 






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>