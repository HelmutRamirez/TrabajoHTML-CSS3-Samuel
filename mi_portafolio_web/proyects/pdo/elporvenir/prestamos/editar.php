<?php
    require_once("../clases/class_prestamo.php");
   
    $clientes= new prestamo();
    $del=$_GET["busqueda"];
    
    $resultado=$clientes->buscar($del);

?>   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/edicion.css?ver=1.2">
    <title>Update</title>
</head>

<body>
    <form action="actualiza.php" method="post" enctype="multipart/form-data">
        <section>
            <p style="font-size: 70px; color:white; font-family:cursive">Actualizar datos de usuario</p>
        </section>

        <nav>




            <?php
            while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $id = $contenido["id_prestamo"];
                $doc = $contenido["fecha_inicio"];
                $nom = $contenido["fecha_final"];
                $apelli = $contenido["prestamo_cantidad"];
                $tel = $contenido["prestamo_valor_total"];
                $corre = $contenido["prestamo_valor_pagado"];
                $clav1 = $contenido["descr_estado_prestamo"];
                $clav2 = $contenido["observaciones_prestamo"];
                $clav3 = $contenido["id_usuario"];
                $clav5 = $contenido["id_asociado_solicitante"];
                $clav6 = $contenido["descr_linea_prestamo"];
                $clav7 = $contenido["tasa_interes"];
                $clav8 = $contenido["descr_modalidad"];
                $clav9 = $contenido["nombre_empresa"];


            }
            ?>
            <div class="editar">

                <label for="Name" style="font-size: 30px; ">Id prestamo:</label>
                <input style="font-size: 30px; " type="text" name="identi" value="<?php echo $id; ?>" readonly><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Fecha inicio:</label>
                <input style="font-size: 30px; " type="date" name="docu" value="<?php echo $doc; ?>" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Fecha fin :</label>
                <input style="font-size: 30px; " type="date" name="tipo" value="<?php echo $nom; ?>"required>

                <br>
                

                <br>
                <label for="Name" style="font-size: 30px; ">Cantidad:</label>
                <input style="font-size: 30px;" type="text" name="nombre" value="<?php echo $apelli; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Total:</label>
                <input style="font-size: 30px;" type="text" name="apellido" value="<?php echo $tel; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Pagado:</label>
                <input style="font-size: 30px; " type="text" name="telefono" value="<?php echo $corre; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Estado actual:</label>
                <input style="font-size: 30px; " type="text" name="telefono" value="<?php echo $clav1; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Nuevo estado actuañ:</label>
                <select name="Estado_prest" id="lang" style="font-size: 30px; "required>
                    <option></option>
                    <option name="estado" value="2">En espera de aprobación:</option>
                    <option name="tipo" value="1">En espera de aprobación:</option>
                    <option name="tipo" value="3">Al dia:</option>
                    <option name="tipo" value="4">En mora:</option>
                    <option name="tipo" value="5">Paz y salvo:</option>
                </select><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Observacion:</label><br>
                <textarea style="font-size: 20px; width:600px; " name="observ" rows="5" value=""><?php echo $clav2;?></textarea>
                <br>
                <br>
                <label for="Name" style="font-size: 30px; ">Id usuario:</label>
                <input style="font-size: 30px; " type="text" name="correo" value="<?php echo $clav3; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Id solicitante:</label>
                <input style="font-size: 30px; " type="text" name="usuario" value="<?php echo $clav5; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Linea actual del prestamo:</label>
                <input style="font-size: 30px; " type="text" name="usuario" value="<?php echo $clav6; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Nueva linea del prestamo:</label>
                <select name="linea_prest" id="lang" style="font-size: 30px; "required>
                    <option></option>
                    <option name="tipo" value="1">Educativos:</option>
                    <option name="tipo" value="2">Educativos:</option>
                    <option name="tipo" value="3">Vacaciones:</option>
                    <option name="tipo" value="4">Libre inversión</option>
                </select><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Tasa de interes:</label>
                <input style="font-size: 30px; " type="text" name="clave" value="<?php echo $clav7; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Modalidad prestamo:</label>
                <input style="font-size: 30px; " type="text" value="<?php echo $clav8; ?>"required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Nueva modalida de prestamo:</label>

                <select name="modalidad" id="lang" style="font-size: 30px; "required>
                    <option></option>
                    <option value="1">Mes vencido</option>
                    <option value="2">Mes anticipado</option>
                </select>
                <br>
                <br>
                

                

                <div class="actualiza">
                <button>Actualizar</button>
                

        </div>
       
        </form>
        </nav>
        <button onclick="location.href='muestra.php'">Volver</button>
</body>

</html>