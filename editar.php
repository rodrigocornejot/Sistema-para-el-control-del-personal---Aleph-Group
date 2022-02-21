<?php
include_once("templates/header.php");
include_once "funciones/conexion.php";
$id = $_POST['id'];
$sql = "select * from empleados where id_empleados = $id";
$result = $conexion->query($sql);
$user = $result->fetch_assoc();
?>
<div class="mx-auto mt-5 container-form" style="width: 400px;">
    <form action="controlador/ControladorUsuario.php" method="post">
        <div class="form-group">
            <label for="nom_ape">Nombre y apellido: </label>
            <input type="text" name="nom_ape" id="nom_ape" class="form-control" value="<?php echo $user['nom_ape']?>">
        </div>
        <div class="form-group">
            <label for="dni">DNI: </label>
            <input type="text" name="dni" id="dni" class="form-control" value="<?php echo $user['dni']?>"?>
        </div>
        <div class="form-group">
            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <?php
            
            $sql = "select * from departamento";
            $stmt = $conexion->query($sql);
            ?>
            <label for="id_dep">Departamento: </label>
            <select class="form-select text-capitalize" id="departamento" name="id_dep">
                <?php while ($dept = $stmt->fetch_assoc()) : ?>
                    <option value="<?php echo $dept['id_departamento'] ?>"><?php echo $dept["departamento"] ?></option>
                <?php endwhile ?>
            </select>
        </div>

        <div class="form-group mt-2 d-flex justify-content-around">
            <input type="hidden" name="tipo" value="actualizar">
            <input type="hidden" name="id" value="<?php echo $user['id_empleados'] ?>">
            <button type="submit" class="btn btn-success">Success</button>
            <a href="crud.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>
</div>
<?php include_once "templates/footer.php" ?>