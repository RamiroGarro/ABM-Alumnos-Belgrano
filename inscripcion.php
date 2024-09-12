<!DOCTYPE html>
<html lang="es">
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
                <form  name="form1" method="get" action="alumnos.php">
                    <table>
                        <tr>
                            <td class=td><font class=tit><b>INSCRIPCIÓN DE ALUMNOS - INGRESO DE DATOS</b></font></td>
                        </tr>
                    </table>
                    <table>
                        <br>
                        <tr>
                            <TD class=tit>Nombre:</TD>
                            <TD><INPUT TYPE="text" NAME="nombre" ID="nombre" SIZE="40" MAXLENGTH="20"></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Apellidos:</TD>
                            <TD><INPUT TYPE="text" NAME="apellidos" ID="apellidos" SIZE="40" MAXLENGTH="30"></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Carrera:</TD>
                            <TD><INPUT TYPE="text" NAME="car" ID="car" SIZE="40" MAXLENGTH="50"></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Nro. documento:&nbsp</TD>
                            <TD><INPUT TYPE="text" NAME="nrodoc" ID="nrodoc" SIZE="40" MAXLENGTH="8"></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Nro. inscripción:</TD>
                            <TD><INPUT TYPE="text" NAME="nroinsc" ID="nroinsc" SIZE="40" MAXLENGTH="4"></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Nro. de teléfono:&nbsp</TD>
                            <TD><INPUT TYPE="text" NAME="nrotelefono" ID="nrotelefono" SIZE="40" MAXLENGTH="10"></TD>
                        </tr>
                        <tr>
                            <TD>Provincia:</TD>
                            <TD class=cuerpotit><select class="form-select" aria-label="Default select example" name="provincia" id="provincia">
                                <option value="">Seleccionar</option>
                                <option value="Mendoza">Mendoza</option>
                                <option value="Cordoba">Cordoba</option>
                                <option value="San Luis">San Luis</option>
                                <option value="Neuquen">Neuquen</option>
                            </select></TD>
                        </tr>
                        <tr>
                            <TD class=tit>Comentarios:</TD>
                            <TD><textarea id="coment" name="coment" cols="50" rows="6" onKeyUp="textCounter(this,150)"></textarea></TD>
                            
                        </tr>                
                        <tr class="table-group-divider">    
                            <TD colspan="2">
                                <br>
                                <INPUT TYPE="submit" class="btn btn-dark" name="insertar" value="Insertar Alumno" onClick="return Validar_formulario(this.form)">
                                <INPUT TYPE="Reset" class="btn btn-dark" value="Borrar">
                            </TD>
                        </tr>                
                    </table>
                </form>
                <br>
                <?php include 'carousel.html'; ?>
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