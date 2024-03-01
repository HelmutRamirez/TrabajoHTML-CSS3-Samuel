<?php
require_once("../clases/class_estado_usu.php");


$cliente = new estado_usuario();
$resultado = $cliente->leeer();

if ($resultado !== false) { 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/mostrar.css?ver=1">
    <title>Usuarios</title>
</head>
<body>
    <section>
        <p style="font-size: 70px; color: white; font-family: cursive">Estado de usuarios</p>
    </section>

    <form action="busqueda.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>


    <nav>
        <form action="socio_asoci.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id estado usuario</p></th>
                    <th colspan="1"><p>Estado</p></th>
                    <th colspan="2"><p>Opciones</p></th>
                    
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_estado_usuario"];
                    $doc = $contenido["descripcion_estado"];
                    
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
                <button>Agregar estado</button>
                <a href="../index.php">Volver</a>
                
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