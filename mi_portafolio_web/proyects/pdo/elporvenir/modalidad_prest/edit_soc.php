<?php
require_once("../clases/class_moda_prest.php");


$cliente = new modalidad_prestamo();
$v1 = $_GET['busqueda'];
$resultado = $cliente->leeer1($v1);

if ($resultado !== false) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../estilos/edicion.css?ver=1.2">
        <title>Documento</title>
    </head>

    <body>
        <form action="inserta_soc.php" method="post">
            <section>
                <p style="font-size: 70px; color: white; font-family: cursive">Actualizar modalidad de prestamo</p>
            </section>

            <nav>
                <?php
                while ($contenido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $id = $contenido["id_modalidad_prestamo"];
                    $doc = $contenido["descr_modalidad"];
                    $variable = 1;
                }
                ?>
                <div class="editar">

                    <label for="Name" style="font-size: 30px; ">Id modalidad prestamo:</label>
                    <input style="font-size: 30px; " type="text" name="tipo" value="<?php echo $id; ?>" readonly><br>
                    <br>
                    <label for="Name" style="font-size: 30px; ">Modalidad de  prestamo:</label>
                    <input style="font-size: 30px; " type="text" name="descrip" value="<?php echo $doc; ?>"><br>
                    <input type="hidden" name="valores" value="<?php echo $variable; ?>"><br>
                    

                </div>
                <div class="actualiza">
                <button>Actualizar</button>
                <a href="mostrar.php">Volver</a>

        </div>
       
        </form>
        </nav>
        
    </body>

    </html>
    <?php
}
?>