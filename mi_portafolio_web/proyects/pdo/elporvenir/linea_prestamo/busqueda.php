<?php
require_once("../clases/class_linea_prest.php");


$cliente = new linea_prestamo();
$hola=$_POST['busqueda'];
$resultado = $cliente->leeer1($hola);

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
        <p style="font-size: 70px; color: white; font-family: cursive">Linea de prestamos</p>
    </section>
    <nav>
        <form action="usuarios/modificar.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id linea prestamo</p></th>
                    <th colspan="1"><p>Linea</p></th>
                    <th colspan="2"><p>Opciones</p></th>
                    
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_linea_prestamo"];
                    $doc = $contenido["descr_linea_prestamo"];
                    
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $doc; ?></td>
                    
                    <td><?php echo "<a href='edit_soc.php?busqueda=" . $id . "'>Editar datos</a>"; ?></td>
                    <td><?php echo "<a href='delete.php?dele=" . $id . "'>Borrar</a>"; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="actualiza">
                <a href="mostrar.php" class="boton-redireccion" style="font-size: 30px; color: blue; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Volver</a>
            </div>
        </form>
    </nav>
</body>
</html>
<?php
} else {
    
    echo "Ocurrió un error al recuperar los datos.";
}
?>