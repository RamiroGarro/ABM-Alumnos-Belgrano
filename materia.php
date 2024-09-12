<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once('lib/dbconect.inc.php');
$mysqli=Conectarse();

//print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if(isset($_REQUEST['insertarmat']) and $_REQUEST['insertarmat'] == 'Insertar materia'){

    //tomamos las variables que vienen del archivo insertarmateria.php
    $stamp_now=time();
    $w_fec_mod=date('Y-m-d',$stamp_now);
    $wmat_nombre 	= $_REQUEST['nombremat'];
    

    //insertamos estas variables en la bd
    $resultado = mysqli_query($mysqli, "INSERT into materia (mat_nombre)
				                values ('$wmat_nombre')");

        //verificamos que la inserción haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
        if($mysqli->affected_rows==1){
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
	} else {
            echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la inserción de datos.'); document.location.href = \"insertarmateria.php\"; </script>";
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
    <body>
        <header>
            <?php include 'header.html'; ?>
            <?php include 'navbar.html'; ?>
        </header>
        <br>
        
        <div class="container">
            <div class="row">
                <div class="col-9">
                    <form  name="form1" method="get" action="materia.php">
                        <table>
                            <tr>
                                <td class=td><font class=tit><b>MATERIAS INSCRIPTAS</b></font></td>
                            </tr>
                        </table>
                        <div class="col-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-2">Código materia</th>
                                        <th scope="col" class="col-10">Nombre materia</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if ($resultado = mysqli_query($mysqli, "SELECT * FROM materia")) {
                                    //el siguiente while permite que se vayan imprimiendo en html de a uno por vez según la tabla de la BD
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo "
                                            <tr>
                                                <td id=\"linea_1_1\" name=\"linea_1_1\">".$row['mat_codigo']."</td>
                                                <td id=\"linea_2_1\" name=\"linea_2_1\">".$row['mat_nombre']."</td>   
                                            </tr>";
                                        }
                                    /* liberar el proceso de RAM sobre el conjunto de resultados */
                                    $resultado->close();
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>                        
                    </form>
                    <a href="insertarmateria.php">Ingresar nueva materia</a>
                    <br><br>
                    <?php include 'carousel.html'; ?>           
                </div>

                <div class="col 3">
                    <?php include 'aside.html'; ?>           
                </div>
                

            </div>   
        </div>
        <br><br>
        <?php include 'footer.html'; ?>
    </body>
</html>