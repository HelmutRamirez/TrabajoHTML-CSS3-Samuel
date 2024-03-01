<?php
require_once("../clases/class_prestamo.php");


$cliente = new prestamo();
$resultado = $cliente->reading();

if ($resultado !== false) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/mostrar.css?ver=1.2"> 
    <title>Usuarios</title>
</head>
<body>
    <section>
        <p style="font-size: 70px; color: white; font-family: cursive">Prestamos registrados</p>
    </section>

    <form action="enlace.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>
<br>
    

    <nav>
        <form action="registrar_prestamo.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id prestamo</p></th>
                    <th colspan="1"><p>Fecha inicion</p></th>
                    <th colspan="1"><p>Fecha fin</p></th>
                    <th colspan="1"><p>Cantidad prestamo</p></th>
                    <th colspan="1"><p>Valor total</p></th>
                    <th colspan="1"><p>Valor pagado</p></th>
                    <th colspan="1"><p>Estado prestamo</p></th>
                    <th colspan="1"><p>Observaciones</p></th>
                    <th colspan="1"><p>ID usuario</p></th>
                    <th colspan="1"><p>ID asociado solicitante</p></th>
                    <th colspan="1"><p>Linea prestamo</p></th>
                    <th colspan="1"><p>Tasa de interes</p></th>
                    <th colspan="1"><p>Modalidad</p></th>
                    <th colspan="1"><p>Empresa</p></th>
                    <th colspan="3"><p>Opciones</p></th>
                </tr>
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
                    
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $doc; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $apelli; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $corre; ?></td>
                    <td><?php echo $clav1; ?></td>
                    <td><?php echo $clav2; ?></td>
                    <td><?php echo $clav3; ?></td>
                    <td><?php echo $clav5; ?></td>
                    <td><?php echo $clav6; ?></td>
                    <td><?php echo $clav7; ?></td>
                    <td><?php echo $clav8; ?></td>
                    <td><?php echo $clav9; ?></td>
                    

                    
                   
                    <td><?php echo "<a href='eliminar.php?delete=" . $id . "' onclick='return confirmarBorrar();'>Borrar</a>"; ?></td>
                    <script>function confirmarBorrar() {return confirm("¿Estás seguro de que deseas borrar este elemento?");}</script>
                    <td><?php echo "<a href='pdf_prestamo.php?pdf_prestamo=" . $clav3. "'>Generar pdf</a>"; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="actualiza">
                <button>Agregar prestamo</button>
    
                
        </div>
        </form>
    </nav>
    <button onclick="location.href='../index.php'">Volver</button>
</body>
</html>
<?php
} else {
  
    echo "Ocurrió un error al recuperar los datos.";
}
?>