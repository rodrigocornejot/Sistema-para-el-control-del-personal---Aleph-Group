<?php include_once "templates/header.php" ?>
<!--<form method="post" action="controlador/datos1.php" class="form1">-->
<div class="mt-5 mx-auto container-form" style="width: 600px;">
	<form method="post" action="controlador/ControladorPermisoPersonal.php">

		<h2>PERMISO PERSONAL</h2>
		
		<!-- <div class="form-group"> -->
			<!-- <label for="otorgado_p">Otorgado por: </label> -->
			<!-- <input type="text" name="otorgado_p" id="otorgado_p" class="form-control"> -->
		<!-- </div> -->

		<div class="form-group">
			<label for="otorgado_p">Autorizado</label>
			<select name="otorgado_p" id="otorgado_p" class="form-select" aria-label="Default select example">
  				<option selected>Selecciona</option>
				<option value="lucia pinedo">Lucia Pinedo</option>
				<option value="eda paucar">Eda Paucar</option>
			</select>
		</div>

		<div class="form-group">
			<label for="fecha_program_p">Fecha programada: </label>
			<input type="date" name="fecha_program_p" id="fecha_program_p" class="form-control">
		</div>

		<div class="form-group">
			<label for="desde_p">Hora Inicial</label>
			<input type="time" name="desde_p" id="desde_p" class="form-control"> 
		</div>

		<div class="form-group">
			<label for="hasta_p">Hora final: </label>	
			<input type="time" name="hasta_p" id="hasta_p" class="form-control">
		</div>

		<div class="form-group">
			<label for="justificacion_p">Justificacion: </label>
			<input type="text" name="justificacion_p" id="justificacion_p" class="form-control">
		</div>
			
		<div class="form-group">
			<label for="comenta_p">Comentarios: </label>
			<textarea name="comenta_p" class="form-control" id="comenta_p"></textarea>
		</div>
		<input type="submit" value="enviar" class="boton1">
	</form>
</div>
<?php include_once "templates/footer.php" ?>