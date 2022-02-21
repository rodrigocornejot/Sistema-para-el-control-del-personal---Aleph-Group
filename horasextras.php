<?php include_once "templates/header.php" ?>
<!--<form method="post" action="controlador/datos1.php" class="form1">-->
<div class="mt-5 mx-auto container-form" style="width: 600px;">
	<form method="post" action="controlador/ControladorHorasExtras.php">

		<h2>HORAS EXTRAS</h2>
		
		<!-- <div class="form-group"> -->
			<!-- <label for="otorgado_h">Otorgado por: </label> -->
			<!-- <input type="text" name="otorgado_h" id="otorgado_h" class="form-control"> -->
		<!-- </div> -->

		<div class="form-group">
			<label for="otorgado_h">Autorizado</label>
			<select name="otorgado_h" id="otorgado_h" class="form-select" aria-label="Default select example">
  				<option selected>Selecciona</option>
				<option value="Lucia pinedo">Lucia Pinedo</option>
				<option value="eda paucar">Eda Paucar</option>
			</select>
		</div>
			
		<div class="form-group">
			<label for="tarea_h">Especificar tareas a realizar: </label>
			<input type="text" name="tarea_h" id="tarea_h" class="form-control">
		</div>

		<div class="form-group">
			<label for="desde_h">Hora inicio: </label>
			<input type="time" name="desde_h" id="desde_h" class="form-control">
		</div>

		<div class="form-group">
			<label for="hasta_h">Hora final: </label>
			<input type="time" name="hasta_h" id="hasta_h" class="form-control">
		</div>
			
		<div class="form-group">
			<label for="fecha_program_h">Fecha programada: </label>
			<input type="date" name="fecha_program_h" id="fecha_program_h" class="form-control">
		</div>
			
		<div class="form-group">
			<label for="comenta_h">Comentarios: </label>
			<textarea name="comenta_h" class="form-control" id="comenta_h"></textarea>
		</div>
		<input type="submit" value="enviar" class="boton1">
	</form>
</div>
<?php include_once "templates/footer.php" ?>