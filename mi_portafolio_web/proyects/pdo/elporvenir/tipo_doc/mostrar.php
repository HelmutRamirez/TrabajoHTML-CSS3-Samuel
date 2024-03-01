<?php
require_once("../clases/class_tipo_docu.php");

$cliente = new tipo_docu();
$resultado = $cliente->leeer();

if ($resultado !== false) { // Verifica si $resultado no es falso
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
        <p style="font-size: 70px; color: white; font-family: cursive">Tipos de docuemnto</p>
    </section>

    <form action="busqueda.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>


    <nav>
        <form action="socio_asoci.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id tipo Documento</p></th>
                    <th colspan="1"><p>Tipo documento</p></th>
                    <th colspan="2"><p>Opciones</p></th>
                    
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_tipo_doc"];
                    $doc = $contenido["descri_tipo_doc"];
                    
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
                <button>Agregar Tipo de doc.</button>
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