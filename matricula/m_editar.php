<?php
include('../conexion.php');

$id=$_GET['id'];
// ABRIMOS LA CONEXION A LA BD 
$conexion = conectar();

$sql = "SELECT * FROM matricula WHERE matricula_id ='$id' ";

// EJECUTAMOS LA INSTRUCCION SQL
$resultado = mysqli_query($conexion,$sql);

    while($ma=mysqli_fetch_assoc($resultado)){

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
    <title>Editar Curso</title>
</head>
<body>
    <div class="container">
		<div class="card">
            <div class="card-header">
    <h1 class="text-center">Curso</h1>
            </div>
    <div class="card-body">
        <form name="formmatricula" method="post" action="editar.php">
        <input type="text" class="form-control" value="<?php echo $ma['matricula_id'] ?>"  name="matricula_id" >
            <div class="form-group">
                <label>Alumno:</label>
                <input type="text" class="form-control" value="<?php echo $ma['alumno_id'] ?>" placeholder="Nombre del Alumno" name="alumno_id" >
            </div>
            <div class="form-group">
                <label>Curso:</label>
                <input type="text" class="form-control" value="<?php echo $ma['curso_id'] ?>" placeholder="Nombre del Curso" name="curso_id" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Editar</button>

        </form>
        <br>
        <div>
            <a href="../matricula/matriculas.php" class="btn btn-primary">Volver a Inicio</a>
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
 