<?php include_once "templates/header.php" ?>
<?php include_once "funciones/administrador.php" ?>

<?php
include 'funciones/conexion.php';

//$id_empleado=$_POST['id_empleado'];
$sql1="SELECT nom_ape,id_empleados FROM empleados";
$resultado11 = $conexion->query($sql1);
$sql2="CALL sp_calculo_sueldo_fecha()";
$resultado12 = $conexion->query($sql2);
//$stmt->bind_param("i",$id_empleado);

?>
<head>
<link href="css/estilos.css" rel="stylesheet">
<link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css%22%3E">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js%22%3E"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js%22%3E"></script>
</head>
    <div class="container">
        <h5>RESUMEN DE AUTORIZACIONES</h5>
    </div>
    <div class="card" id="registro">
            <div class="card-body">
                <table class="table table-sm table-dark table-responsive-sm" id="descuentos">
                    <thead>
                    <tr>
                        <th style="width:200px">Colaborador</th>
                        <th style="width:90px">Sueldo</th>
                        <th style="width:100px">Mes</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php ?>
                        <tr>
                            <td class="empleado">
                                <select class="form-control" name="ape_nom" id="ape_nom" ">
                                    <option value="" selected disabled>Empleados</option>
                                    <?php while ($filas=$resultado11->fetch_assoc()):
                                    echo '<option value="'.$filas['id_empleado'].'">' .$filas['nom_ape'].'</option>';
                                    endwhile ?>
                                </select>
                            </td>
                            <td><input type="text"></td>
                            <td><input type="text" class="form-control" name="datepicker" id="datepicker" /></td>
                        </tr>
                    <?php ?>
                </tbody>
            </table>
            <script>
                var dp=$("#datepicker").datepicker( {
                format: "mm-yyyy",
                startView: "months", 
                minViewMode: "months"
            });

                dp.on('changeMonth', function (e) {    
                //do something here
                alert("Month changed");
            });
            </script>
        </div>
        
        <label class="btn btn-secondary active">
            <a type="radio" name="options" id="option1" onclick="mostrarCalculo();">Calculo</a>
        </label>
    </div>

    <div class="card" style="width:100%" id="calculo">
            <div class="card-body">
                <table class="table table-sm table-dark table-responsive-sm" id="descuentos" style="width:100%">
                    <thead>
                    <tr>
                        <th>Colaborador</th>
                        <th>Sueldo</th>
                        <th>Sueldo/Hora</th>
                        <th>Total H.E/pago</th>
                        <th>SOBRETASA 25%</th>
                        <th>SOBRETASA 35%</th>
                        <TH>Pago H.E</TH>
                        <th>Total H.E/Compensacion</th>
                        <th>Total Horas/Compensacion de H.E</th>
                        <th>Diferencia para compensar H.E</th>
                        <th>Total Horas por Permisos Personales</th>
                        <th>Dscto. por permisos</th>
                        <th>Total Horas/trabajo campo</th>
                        <th>Total a PAGAR/DESCONTAR</th>
                    </tr>
                    </thead>
                <tbody>
                    <?php while ($filas12=$resultado12->fetch_assoc()): ?>
                        <tr>
                            <td class="empleado"><label for=""><?php echo $filas12['nom_ape']; ?></label></td>
                            <td><label for=""><?php echo $filas12['sueldo']; ?></label></td>
                            <td><label for="">
                            <?php
                                $sueldo = $filas12['sueldo'];
                                $sueldohora=($sueldo/30/8);
                                echo($sueldohora);
                            ?></label>
                            </td>
                            <td><?php echo $filas12['C_Horas_extras'];?></td>
                            <td>
                            <?php
                                if ($filas12['C_Horas'] >= 2) {
                                    $porcentaje25=($sueldohora*25/100);
                                    echo ($porcentaje25);
                                }
                                else {
                                    echo 'Mas horas extras';
                                }
                            ?>
                            </td>
                            <td><?php 
                                if ($filas12['C_Horas']-2 >= 3) {
                                    $porcentaje35=($sueldohora*35/100);
                                    echo ($porcentaje35);
                                }
                                else {
                                    echo 'Menos horas extras';
                                }
                            ?></td>
                            
                            <td><?php
                            $pago_he; 
                            echo $pago_he=($sueldohora*($porcentaje25+$porcentaje35)); ?></td>
                            <td><?php echo $filas12['C_Horas_extras']?></td>
                            <td><?php echo $filas12['C_Horas_Compensacion']?></td>
                            <td><?php echo $filas12['C_Horas_extras']-$filas12['C_Horas_Compensacion']?></td>
                            <td><?php echo $filas12['C_Horas_permiso'];?></td>
                            <td><?php
                            $desc_permisos;
                            echo $desc_permisos=($sueldohora*$filas12['C_Horas_permiso']);?></td>
                            <td><?php echo $filas12['C_Horas'];?></td>
                            <td><?php
                            $pagototal;
                            echo $pagototal=($desc_permisos-$pago_he);
                            ?></td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
        <label class="btn btn-secondary active">
            <a type="radio" name="options" id="option1" onclick="mostrarRegistro();">REGISTRO</a>
        </label>
    </div>

<style type="text/css">
        #registro{
            display: none;
        }
</style>
<script type="text/javascript">
            function mostrarRegistro() {
                document.getElementById('registro').style.display = 'block';
                document.getElementById('calculo').style.display = 'none';
            }
            function mostrarCalculo() {
                document.getElementById('calculo').style.display = 'block';
                document.getElementById('registro').style.display = 'none';
            }
</script>
<?php include_once "templates/footer.php" ?>
