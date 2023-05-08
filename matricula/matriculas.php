<?php 

include('../conexion.php');

$curso_id = $_POST['curso_id'];
$alumno_id = $_POST['alumno_id'];

$conexion = conectar();


if (isset($_GET['id'])) {
    $matricula_id = (int)$_GET['id'];

    $sqleliminar = "DELETE FROM matricula WHERE matricula_id = $matricula_id";

    $eliminar = mysqli_query($conexion, $sqleliminar);

    if ($eliminar) {
        header("Location: matriculas.php");
        exit();
    }
}

if (isset($_POST['registrar'])) {
    $curso_id = $_POST['curso_id'];
    $alumno_id = $_POST['alumno_id'];

    $sqlingreso = "INSERT INTO matricula (curso_id, alumno_id) VALUES ('$curso_id', '$alumno_id')";

    $ingreso = mysqli_query($conexion, $sqlingreso);

    if ($ingreso) {
        header("Location: matriculas.php");
        exit();
    }
}

$sql = 'SELECT matricula_id, cursos, CONCAT(nombres, " ", ape_paterno, " ", ape_materno) AS nombres
        FROM matricula
        JOIN curso ON matricula.curso_id = curso.curso_id
        JOIN alumno ON matricula.alumno_id = alumno.alumno_id';

$resultado = mysqli_query($conexion,$sql);

$sql_cursos = "SELECT curso_id, cursos FROM curso";
$result_cursos = mysqli_query($conexion, $sql_cursos);

$sql_alumnos = "SELECT alumno_id, CONCAT(nombres, ' ', ape_paterno, ' ', ape_materno) AS nombres FROM alumno";
$resultado_alumnos = mysqli_query($conexion, $sql_alumnos);

$alumnos = array();
while ($row_alumnos = mysqli_fetch_assoc($resultado_alumnos)) {
    $alumnos[$row_alumnos['alumno_id']] = $row_alumnos['nombres'];
}

desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <h1 class="text-center p-3">Matriculas</h1>
    
    <div class="container-fluid row">
    <form class="col-4 p-3" method="post">
        <h3 class="text-center">Registrar matricula</h3>
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select class="form-select" name="curso_id" id="curso_id">
                <option value="">Seleccionar</option>
                <?php while($row_cursos = mysqli_fetch_assoc($result_cursos)) { ?>
                <option value="<?php echo $row_cursos['curso_id']; ?>"><?php echo $row_cursos['cursos']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select class="form-select" name="alumno_id" id="alumno_id">
                <option value="">Seleccionar</option>
                <?php foreach ($alumnos as $id => $nombres) { ?>
                    <option value="<?php echo $id; ?>"><?php echo $nombres; ?></option>
                <?php } ?>
            </select>
        </div>

        
        <button type="submit" class="btn btn-primary" name="registrar" >Registrar</button>
    </form>
    
        <table>
            <thead >
                <tr>
                    <th>matricula_id</th>
                    <th>curso_id</th>
                    <th>alumno_id</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                while($curso = mysqli_fetch_array($resultado)){

                    $matricula_id = $curso['matricula_id'];
                    $curso_id = $curso['cursos'];
                    $alumno_id = $curso['nombres'];
            
                    echo '<tr>';
                    echo '<td>'.$matricula_id.'</td>';
                    echo '<td>'.$curso_id.'</td>';
                    echo '<td>'.$alumno_id.'</td>';
                    echo '<td>
                    <a href="m_editar.php?id='.$matricula_id.'" class="btn btn-primary">Editar</a>';
                    echo '<a href="matriculas.php?id='.$matricula_id.'"class="btn btn-primary">Eliminar</a></td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>