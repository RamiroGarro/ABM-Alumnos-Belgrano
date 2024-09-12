<?php
//inluimos el archivo que nos permite llamar a una función que se conecta a la  Bd y nos devuelve una conexión exitosa
require_once('lib/dbconect.inc.php');
$mysqli=Conectarse();

//print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if(isset($_REQUEST['insertar']) and $_REQUEST['insertar'] == 'Insertar Alumno'){

    //tomamos las variables que vienen del archivo index.html
    $stamp_now=time();
    $w_fec_mod=date('Y-m-d',$stamp_now);
    $wins_cod_car	= $_REQUEST['car'];
    $walu_nro_doc 	= $_REQUEST['nrodoc'];
    $walu_nombre	= $_REQUEST['nombre'];
    $walu_apellido	= $_REQUEST['apellidos'];
    $walu_nroinsc	= $_REQUEST['nroinsc'];
    $walu_provincia	= $_REQUEST['provincia'];
    $walu_coment	= $_REQUEST['coment'];
    $walu_nrotelefono   = $_REQUEST['nrotelefono'];

    //insertamos estas variables en la bd
    $resultado = mysqli_query($mysqli, "INSERT into alumno (alu_dni, alu_nombre, alu_apellido, alu_carrera, alu_insc, alu_telefono, alu_provincia, alu_coment)
				                values ($walu_nro_doc,'$walu_nombre','$walu_apellido','$wins_cod_car',$walu_nroinsc,$walu_nrotelefono,'$walu_provincia','$walu_coment')");

        //verificamos que la inserción haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
        if($mysqli->affected_rows==1){
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
	} else {
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la inserción de datos.'); document.location.href = \"inscripcion.php\"; </script>";
	}

} else if(isset($_REQUEST['eliminar']) and $_REQUEST['eliminar'] == 001){
//tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del botón la utilizamos para llegar 
//hasta aquí y no a otro lugar

//eliminamos este alumno de la bd
    $resultado = mysqli_query($mysqli,"DELETE FROM alumno WHERE alu_dni = ".$_REQUEST['walu_dni']."");


        //verificamos que la eliminación haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
        if($mysqli->affected_rows==1){
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha eliminado exitosamente.'); document.location.href = \"alumnos.php\"; </script>";
        } else {
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la eliminaci&oacuten de datos.'); document.location.href = \"alumnos.php\"; </script>";
        }
}
?>


<!-- Este código será usado si los datos los enviamos por get y no utilizamos la db
<script src="js/funciones.js"></script>
onLoad="mostrar();"
-->

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ABM ALUMNOS BELGRANO</title>
        <link rel="STYLESHEET" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    </head>
    <body >
        <header>
            <?php include 'header.html'; ?>
            <?php include 'navbar.html'; ?>
        </header>
        <br>
        
        <div class="container">
            <div class="row">
                <div class="col">
                    <form  name="form1" method="get" action="alumnos.php">
                        <table>
                            <tr>
                                <td class=td><font class=tit><b>ALUMNOS INSCRIPTOS POR CARRERA</b></font></td>
                            </tr>
                        </table>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Carrera</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Inscripción</th>
                                <th scope="col">Teléfono.</th>
                                <th scope="col">Provincia</th>
                                <th scope="col">Comentarios</th>
                                <th scope="col">Actualizar</th>
                                <th scope="col">Eliminar</th>

                              </tr>
                            </thead>
                            <tbody>


                                <?php
                                if ($resultado = mysqli_query($mysqli, "SELECT * FROM alumno")) {
                                //el siguiente while permite que se vayan imprimiendo en html de a uno por vez según la tabla de la BD
                                    while ($row = $resultado->fetch_assoc()) {
                                        echo "
                                        <tr>
                                            <td id=\"linea_1_1\" name=\"linea_1_1\">".$row['alu_carrera']."</td>
                                            <td id=\"linea_2_1\" name=\"linea_2_1\">".$row['alu_apellido']."</td>
                                            <td id=\"linea_3_1\" name=\"linea_3_1\">".$row['alu_nombre']."</td>
                                            <td id=\"linea_4_1\" name=\"linea_4_1\">".$row['alu_dni']."</td>
                                            <td id=\"linea_5_1\" name=\"linea_5_1\">".$row['alu_insc']."</td>
                                            <td id=\"linea_6_1\" name=\"linea_6_1\">".$row['alu_telefono']."</td>
                                            <td id=\"linea_7_1\" name=\"linea_7_1\">".$row['alu_provincia']."</td>
                                            <td id=\"linea_8_1\" name=\"linea_8_1\">".$row['alu_coment']."</td>
                                            <td id=\"linea_9_1\" name=\"linea_9_1\"><div align=\"center\"><a href=\"actualizar.php?modificar=001&walu_dni=".$row['alu_dni']."\"><img src=\"img/upd.gif\" width=\"20\" height=\"20\" /></a></div></td>    
                                            <td id=\"linea_10_1\" name=\"linea_10_1\"><div align=\"center\"><a href=\"alumnos.php?eliminar=001&walu_dni=".$row['alu_dni']."\"><img src=\"img/del.gif\" width=\"20\" height=\"20\" /></a></div></td>    
                                        </tr>";
                                    }
                                /* liberar el proceso de RAM sobre el conjunto de resultados */
                                $resultado->close();
                                }
                                ?>
                            </tbody>
                        </table>
                    </form>
                    <a href="inscripcion.php">Ingresar Nuevo Alumno</a>
                    <br><br>
                    <?php include 'carousel.html'; ?>
                </div>
            </div>            
        </div>
        
        <br><br>
        <?php include 'footer.html'; ?>
    </body>
</html>