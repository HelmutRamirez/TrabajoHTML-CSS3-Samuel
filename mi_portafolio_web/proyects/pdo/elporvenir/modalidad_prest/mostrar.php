<?php
require_once("../clases/class_moda_prest.php");


$cliente = new modalidad_prestamo();
$resultado = $cliente->leeer();

if ($resultado !== false) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/mostrar.css?ver=1">
    <title>Documento</title>
</head>
<body>
    <section>
        <p style="font-size: 70px; color: white; font-family: cursive">Modalidades de prestamo</p>
    </section>

    <form action="busqueda.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>


    <nav>
        <form action="socio_asoci.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id modalidad prestamo</p></th>
                    <th colspan="1"><p>Modalidad</p></th>
                    <th colspan="2"><p>Opciones</p></th>
                    
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_modalidad_prestamo"];
                    $doc = $contenido["descr_modalidad"];
                    
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $doc; ?></td>
                    
                    <td><?php echo "<a href='edit_soc.php?busqueda=" . $id . "'>Editar datos</a>"; ?></td>
                    <td><?php echo "<a href='delete.php?delete=" . $id . "' onclick='return confirmarBorrar();'>Borrar</a>"; ?></td>
                    <script>function confirmarBorrar() {return confirm("¿Estás seguro de que deseas borrar este elemento?");}</script>
                 
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="actualiza">
                <button>Agregar modalidad</button>
    
                
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