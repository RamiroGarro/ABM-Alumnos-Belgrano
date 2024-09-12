<?php
    //inluimos el archivo que nos permite llamar a una función que se conecta a la  Bd y nos devuelve una conexión exitosa
    require_once('lib/dbconect.inc.php');
    $mysqli=Conectarse();

    //print es para saber que es lo que viene del archivo anterior
    //print_r($_REQUEST);

    //la variable modificar es la que viene del icono y si se hizo click allí se podrá ingresar
    if(isset($_REQUEST['modificar']) and $_REQUEST['modificar'] == 001){

        if ($resultado = mysqli_query($mysqli, "SELECT * FROM alumno  WHERE  alu_dni = ".$_REQUEST['walu_dni']."")) {
            //observen que queda la llave del while abierta y la de del if anterior esto se atendera al finalizar la consulta que llenara los campos a actualizar
            while ($row = $resultado->fetch_assoc()) {
?>
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <title>ABM ALUMNOS BELGRANO</title>
                        <link rel="STYLESHEET" type="text/css" href="css/estilos.css">
                        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
                        <link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
                        <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
                        <script src="js/funciones.js"></script>
                        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
                    </head>
                    <body>
                    <header>
                        <?php include 'header.html'; ?>
                        <?php include 'navbar.html'; ?>
                    </header>
                    <br>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                                <form  name="form2" method="get" action="actualizar.php">
                                    <input id="nrodoc" name="nrodoc" type="hidden" value=<?php echo $row['alu_dni'] ?>>
                                    <table>
                                        <tr>
                                            <td class=td><font class=tit><b>ACTUALIZACIÓN DE ALUMNOS</b></font></td>
                                        </tr>
                                    </table>
                                    <table>
                                        <br>
                                        <tr>
                                            <TD class=tit>Nombre:</TD>
                                            <TD><INPUT TYPE="text" NAME="nombre" ID="nombre" SIZE="20" MAXLENGTH="20" value="<? echo $row['alu_nombre']; ?>"></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Apellidos:</TD>
                                            <TD><INPUT TYPE="text" NAME="apellidos" ID="apellidos" SIZE="20" MAXLENGTH="30" value="<? echo $row['alu_apellido']; ?>"></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Carrera:</TD>
                                            <TD><INPUT TYPE="text" NAME="car" ID="car" SIZE="20" MAXLENGTH="50" value="<? echo $row['alu_carrera']; ?>"></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Nro. documento:</TD>
                                            <TD><INPUT TYPE="text" NAME="nrodoc1" ID="nrodoc1" SIZE="20" MAXLENGTH="8" value=<?php echo $row['alu_dni'] ?> "" DISABLED/></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Nro. inscripción:</TD>
                                            <TD><INPUT TYPE="text" NAME="nroinsc" ID="nroinsc" SIZE="20" MAXLENGTH="4" value=<?php echo $row['alu_insc'] ?>></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Nro. de teléfono:</TD>
                                            <TD><INPUT TYPE="text" NAME="nrotelefono" ID="nrotelefono" SIZE="20" MAXLENGTH="10" value=<?php echo $row['alu_telefono'] ?>></TD>
                                        </tr>
                                        <tr>
                                            <TD>Provincia:</TD>
                                            <TD class=cuerpotit><select class="form-select" aria-label="Default select example" name="provincia" id="provincia">
                                                <option value="">Seleccionar</option>
                                                <option value="Mendoza"<?php if (!(strcmp("Mendoza", $row['alu_provincia']))) {echo "selected=\"selected\"";} ?>>Mendoza</option>
                                                <option value="Cordoba"<?php if (!(strcmp("Cordoba", $row['alu_provincia']))) {echo "selected=\"selected\"";} ?>>Cordoba</option>
                                                <option value="San Luis"<?php if (!(strcmp("San Luis", $row['alu_provincia']))) {echo "selected=\"selected\"";} ?>>San Luis</option>
                                                <option value="Neuquen"<?php if (!(strcmp("Neuquen", $row['alu_provincia']))) {echo "selected=\"selected\"";} ?>>Neuquen</option>
                                            </select></TD>
                                        </tr>
                                        <tr>
                                            <TD class=tit>Comentarios:</TD>
                                            <TD><textarea id="coment" name="coment" cols="35" rows="6" onKeyUp="textCounter(this,150)"><?php echo $row['alu_coment'] ?></textarea></TD>
                                        </tr>
                                        <tr>                
                                        <tr>
                                            <TD colspan="2">
                                                <br>
                                                <INPUT TYPE="submit" class="btn btn-dark" name="Actualizar_Alumno" value="Actualizar Alumno" onClick="return Validar_formulario(this.form)">
                                                <INPUT TYPE="Reset" class="btn btn-dark" value="Borrar">
                                             </TD>
                                        </tr>    
                                                 
                                    </table>
                                </form>
                            </div>

                            <div class="col-3">
                                <?php include 'aside.html'; ?>
                            </div>
                        </div>
                    </div>
                                      
                    <br><br>
                    <?php include 'footer.html'; ?>
                    
                    </body>
                </html>
<?php
            } //aqui cerramos el while de la sql
        } else { echo "Alumnos inexistente"; header ("Location: ./alumnos.php"); }
    } else if(isset($_REQUEST['Actualizar_Alumno']) and $_REQUEST['Actualizar_Alumno'] == 'Actualizar Alumno'){
    //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del bot�n la utilizamos para llegar
    //hasta aqu� y no a otro lugar
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
        $resultado = mysqli_query($mysqli, "UPDATE alumno SET alu_dni = $walu_nro_doc,
                                                              alu_nombre = '$walu_nombre',alu_apellido = '$walu_apellido',
                                                              alu_provincia ='$walu_provincia',alu_carrera='$wins_cod_car',
                                                              alu_coment ='$walu_coment', alu_insc = $walu_nroinsc,
                                                              alu_telefono=$walu_nrotelefono
                                            WHERE alu_dni = ".$_REQUEST['nrodoc']." ");

            //verificamos que la inserción haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
        if($mysqli->affected_rows==1){
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha actualizado exitosamente.'); document.location.href = \"alumnos.php\"; </script>";
        } else {
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la modificación de datos.'); document.location.href = \"actualizar.php?modificar=001&walu_dni=".$_REQUEST['nrodoc']."\"; </script>";
        }
    } else { echo "Archivo incorrecto";  header ("Location: ./alumnos.php");  }
?>