<?php
require_once("../clases/class_soci.php");


$cliente = new socio_asociado();
$hola=$_POST['busqueda'];
$resultado = $cliente->leeer1($hola);

if ($resultado !== false) { // Verifica si $resultado no es falso
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/mostrar.css?ver=1"> <!-- Corregido el enlace al archivo CSS -->
    <title>Usuarios</title>
</head>
<body>
    <section>
        <p style="font-size: 70px; color: white; font-family: cursive">Socios-Asociados</p>
    </section>

    <form action="enlace.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>


    <nav>
        <form action="usuarios/modificar.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id usuario</p></th>
                    <th colspan="1"><p>Documento</p></th>
                    <th colspan="2"><p>Opciones</p></th>
                    
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_tipo_usuario"];
                    $doc = $contenido["descr_asociado"];
                    
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
    // Manejo de errores, por ejemplo, mostrar un mensaje de error en caso de fallo en la consulta
    echo "Ocurrió un error al recuperar los datos.";
}
?>