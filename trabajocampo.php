<?php include_once "templates/header.php" ?>
<!--<form class="form1">-->
<div class="mt-5 mx-auto container-form" style="width: 600px;">
    <form method="post" action="controlador/ControladorTrabajoCampo.php">

        <h2>AUTORIZACION PARA TRABAJO EN CAMPO</h2>

        <!-- <div class="form-group"> -->
            <!-- <label for="servicio">Tipo de servicio: </label> -->
            <!-- <input class="form-control" type="text" name="servicio" id="servicio"> -->
        <!-- </div> -->

        <div class="form-group">
			<label for="servicio">Tipo de gestion: </label>
			<select name="servicio" id="servicio" class="form-select" aria-label="Default select example">
  				<option selected>Selecciona</option>
				<option value="operativa">Operativa</option>
				<option value="administrativa">Administrativa</option>
			</select>
		</div>

        <div class="form-group">
            <label for="fecha_salida">Hora Inicial: </label>
            <input type="time" name="fecha_salida" id="fecha_salida" class="form-control">
        </div>

        <div class="form-group">
            <label for="fecha_retorno">Hora Final: </label>
            <input class="form-control" type="time" name="fecha_retorno" id="fecha_retorno">
        </div>

        <div class="form-group">
            <label for="tareas_t">Especificar tareas a realizar: </label>
            <input class="form-control" type="text" name="tareas_t" id="tareas_t"> 
        </div>

        <div class="form-group">
            <label for="comenta_t">Comentarios: </label>
            <textarea name="comenta_t" class="form-control"></textarea>
        </div>
        <input type="submit" value="enviar" class="boton">
    </form>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/sweetAlert.js"></script>
    
</div>
<?php include_once "templates/footer.php" ?>