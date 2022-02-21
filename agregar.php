<?php include_once "templates/header.php" ?>
<div class="mt-5 mx-auto container-form " style="width: 400px;">
    <form action="controlador/ControladorUsuario.php" method="post">
        <div class="form-group">
            <label for="nom_ape">Nombre y apellido: </label>
            <input type="text" name="nom_ape" id="nom_ape" class="form-control">
        </div>
        <div class="form-group">
            <label for="dni">DNI: </label>
            <input type="text" name="dni" id="dni" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <?php
                include_once "funciones/conexion.php";
                $sql = "select * from departamento";
                $stmt = $conexion->query($sql);
            ?>
                <label for="id_dep">Departamento: </label>
                <select class="form-control" id="departamento" name="id_dep">
            <?php while($dept=$stmt->fetch_assoc()):?>
                <option value="<?php echo $dept['id_departamento']?>"><?php echo $dept["departamento"]?></option>
              <?php endwhile?>
            </select>
          </div>

        <input type="hidden" name="tipo" value="agregar">
        <button type="submit" class="btn btn-success">Success</button>
        <a href="crud.php" class="btn btn-dark">Regresar</a>
    </form>
</div>
<?php include_once "templates/footer.php" ?>