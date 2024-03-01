<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/registro.css?ver=1.2">
    <title>Document</title>
</head>

<body>
    <section>
        <p style="font-size: 70px; color:white; font-family:cursive">Registro de datos</p>
    </section>

    <form action="inserta_soc.php" method="post">
    <nav>
        <div class="editar">
            <?php
                $variable=3;
            ?>
            <label for="Name" style="font-size: 30px; ">Id tipo:     </label>
            <input style="font-size: 30px; " type="text" name="tipo" value=""required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Descripcion:</label>
            <input style="font-size: 30px; " type="text" name="descrip" value="" required><br>
            <input type="hidden" name="valores" value="<?php echo $variable; ?>"><br>
        </div>
        <div class="actualiza">
                <button>Guardar</button>
                <button onclick="location.href='mostrar.php'">Volver</button>

        </div>
       
        </form>
        </nav>

</body>

</html>