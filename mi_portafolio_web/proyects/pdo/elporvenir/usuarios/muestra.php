<?php
require_once("../clases/class.php");


$cliente = new trabajito();
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
        <p style="font-size: 70px; color: white; font-family: cursive">Usuarios registrados</p>
    </section>

    <form action="enlace.php" method="post">
        <input style="font-size: 30px" type="text" name="busqueda" required>
        <input type="submit" value="Buscar" style="font-size: 30px; color: blue;">
    </form>
<br>
    <form action="pdf_todo.php" method="post">
        <input type="submit" value="Generar pdf de todos los datos" style="font-size: 30px; color: blue;">
    </form>

    <nav>
        <form action="registro.php" method="post">
            <table width="90%">
                <tr>
                    <th colspan="1"><p>Id usuario</p></th>
                    <th colspan="1"><p>Documento</p></th>
                    <th colspan="1"><p>Nombre</p></th>
                    <th colspan="1"><p>Apellido</p></th>
                    <th colspan="1"><p>Correo</p></th>
                    <th colspan="1"><p>Usuario sistema</p></th>
                    <th colspan="1"><p>Estado actual usuario</p></th>
                    <th colspan="1"><p>Tipo usuario actual</p></th>
                    <th colspan="4"><p>Opciones</p></th>
                </tr>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_usuario"];
                    $doc = $contenido["identidad_usuario"];
                    $nom = $contenido["descri_tipo_doc"];
                    $apelli = $contenido["nombre_usuario"];
                    $tel = $contenido["apellido_usuario"];
                    $corre = $contenido["telef_usuario"];
                    $clav1 = $contenido["direcc_usuario"];
                    $clav2 = $contenido["correo_usuario"];
                    $clav3 = $contenido["usuario_sistema"];
                    $clav5 = $contenido["descripcion_estado"];
                    $clav6 = $contenido["descr_asociado"];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $doc; ?></td>
                    <td><?php echo $apelli; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $clav2; ?></td>
                    <td><?php echo $clav3; ?></td>
                    <td><?php echo $clav5; ?></td>
                    <td><?php echo $clav6; ?></td>
                    <td><?php echo "<a href='vertodo.php?buscarrr=" . $id . "'>Ver todos los datos</a>"; ?></td>
                    <td><?php echo "<a href='enlace2.php?busqueda=" . $id . "'>Editar datos</a>"; ?></td>
                    <td><?php echo "<a href='delete.php?delete=" . $id . "' onclick='return confirmarBorrar();'>Borrar</a>"; ?></td>
                    <script>function confirmarBorrar() {return confirm("¿Estás seguro de que deseas borrar este elemento?");}</script>
                    <td><?php echo "<a href='pdfs.php?buscar2=" . $id . "'>Generar pdf</a>"; ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="actualiza">
                <button>Agregar usuario</button>
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