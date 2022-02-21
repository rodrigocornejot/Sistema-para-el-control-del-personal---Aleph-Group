<?php include_once "templates/header.php" ?>
<div class="mt-5 mx-auto container-form" style="width: 600px;">
	<form method="post" action="controlador/ControladorCompensacionHoras.php">

		<h2>COMPENSACION DE HORAS</h2>

		<!-- <div class="form-group"> -->
			<!-- <label for="otorgado_c">Otorgado por: </label>	 -->
			<!-- <input type="text" name="otorgado_c" id="otorgado_c" class="form-control"> -->
		<!-- </div> -->
		
		<label for="otorgado_c">Autorizado</label>
		<select name="otorgado_c" id="otorgado_c" class="mdb-select md-form">
			<option value="" disable selected>Otorgado por</option>
			<option value="1">Lucia Pinedo</option>
			<option value="2">Eda Paucar</option>
		</select>

		<div class="form-group">
			<label for="tareas_c">Especificar tareas a realizar: </label>
			<input type="text" name="tareas_c" id="tareas_c" class="form-control">
		</div>

		<div class="form-group">
			<label for="fecha_program_c">Fecha programada: </label>
			<input type="date" name="fecha_program_c" id="fecha_program_c" class="form-control">
		</div>

		<div class="form-group">
			<label for="comenta_c">Comentarios: </label>
			<textarea name="comenta_c" class="form-control"></textarea>
		</div>
		<input type="submit" value="enviar" class="boton">
	</form>
</div>
<?php include_once "templates/footer.php" ?>