<?php

include('../conexion.php');


// Abrimos la conexión a la BD 
$conexion = conectar();

$sql = 'SELECT curso_id, cursos FROM curso';

$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Cursos</title>
</head>
<body>
    <h1 class="text-center" >Cursos</h1>
    <style>
        .container {
    width: 30%;
    margin-top: 100px;

}

    </style>
    <div class="container">
        <a href="c_agregar.html" class="btn btn-primary">Nuevo Curso</a>
        <div class="card mx-auto mt-5">
            <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cursos</th>
                   
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php
                //Recorrer el array con el resultado de la consulta
                while($curso = mysqli_fetch_array($resultado)) {
                    $curso_id = $curso['curso_id'];
                    $cursos = $curso['cursos'];
    
                    echo '<tr>';
                    echo '<td>' . $curso_id . '</td>';
                    echo '<td>' . $cursos . '</td>';
                   
                    echo '<td><a href="e_curso.php?id=' . $curso_id . '" class="btn btn-primary">Editar</a>
                     <a href="eliminar_curso.php?id=' . $curso_id . '" class="btn btn-primary">Eliminar</a></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
</body>
</html>