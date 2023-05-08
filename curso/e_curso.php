<?php
include('../conexion.php');

$id=$_GET['id'];
// ABRIMOS LA CONEXION A LA BD 
$conexion = conectar();

$sql = "SELECT * FROM curso WHERE curso_id ='$id' ";


$resultado = mysqli_query($conexion,$sql);

    while($cur=mysqli_fetch_assoc($resultado)){


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
        <form name="formCurso" method="post" action="editar_curso.php">
        <input type="text" class="form-control" value="<?php echo $cur['curso_id'] ?>"  name="curso_id" >
            <div class="form-group">
                <label>Curso:</label>
                <input type="text" class="form-control" value="<?php echo $cur['cursos'] ?>" placeholder="Nombre del Curso" name="cursos" >
            </div>
            <br>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Editar</button>

        </form>
        <br>
        <div>
            <a href="../curso/cursos.php" class="btn btn-primary">Volver a Inicio</a>
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
 