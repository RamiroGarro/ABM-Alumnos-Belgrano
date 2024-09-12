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
                <form  name="form21" method="get" action="materia.php">
                    <table>
                        <tr>
                            <td class=td><font class=tit><b>INSERCIÓN DE MATERIAS</b></font></td>
                        </tr>
                    </table>
                    <table>
                        <br>
                        <tr>
                            <TD class=tit>Nombre:&nbsp</TD>
                            <TD><INPUT TYPE="text" NAME="nombremat" ID="nombremat" SIZE="40" MAXLENGTH="50"></TD>
                        </tr>
                        <tr>    
                            <TD colspan="2">
                                <br>
                                <INPUT TYPE="submit" class="btn btn-dark" name="insertarmat" value="Insertar materia" onClick="return Validar_formulario(this.form)">
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
        <br>
        

        
        
    </div>
    <br><br>
    <?php include 'footer.html'; ?>
</body>
</html>