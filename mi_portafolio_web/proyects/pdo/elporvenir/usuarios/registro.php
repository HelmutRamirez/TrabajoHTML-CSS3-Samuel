<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/registro.css?ver=1.6">
    <title>Document</title>
</head>

<body>
    <section>
        <p style="font-size: 70px; color:white; font-family:cursive">Registro de datos</p>
    </section>

    <form action="inserta.php" method="post" enctype="multipart/form-data">
    <nav>
        <div class="editar">

            <label for="Name" style="font-size: 30px; ">Id usuario:</label>
            <input style="font-size: 30px; " type="text" name="identi" value=""required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Documento:</label>
            <input style="font-size: 30px; " type="text" name="docu" value="" required><br>
            
            
            <br>
            <label for="Name" style="font-size: 30px; ">Nuevo tipo documento:</label>
            <select name="tipo" id="lang" style="font-size: 30px;" required>
                <option></option>
                <option name="Tarjeta identidad" value="1">Tarjeta identidad</option>
                <option name="Cedula de ciudadania" value="2">Cedula de ciudadania</option>
                <option name="Pasaport" value="3">Pasaporte</option>
            </select></td><br>

            <br>
            <label for="Name" style="font-size: 30px; ">Nombre:</label>
            <input style="font-size: 30px;" type="text" name="nombre" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Apellido:</label>
            <input style="font-size: 30px;" type="text" name="apellido" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Telefono:</label>
            <input style="font-size: 30px; " type="text" name="telefono" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Direccion:</label>
            <input style="font-size: 30px; " type="text" name="direcc" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Correo:</label>
            <input style="font-size: 30px; " type="text" name="correo" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Usuario sistema:</label>
            <input style="font-size: 30px; " type="text" name="usuario" value="" required><br>
            <br>
            <label for="Name" style="font-size: 30px; ">Contraseña:</label>
            <input style="font-size: 30px; " type="password" name="clave" value="" required><br>
            <br>

            <label for="Name" style="font-size: 30px;">Estado usuario:</label>

            <select name="Estado" id="lang" style="font-size: 30px; "required>
                <option></option>
                <option name="estado" value="1">Activo:</option>
                <option name="tipo" value="5">Inactivo:</option>
            </select>
            <br>
            <br>


            <label for="Name" style="font-size: 30px; ">Tipo usuario:</label>
            <select name="Tipousuario" id="lang" style="font-size: 30px; " required>
                <option></option>
                <option value="6">Socio</option>
                <option value="8">Asociado</option>
            </select>
            <br>
            <br>

            <label for="Name" style="font-size: 30px; " >Imagen:</label>
            <input style="font-size: 20px; " type="file" name="imagen" size="20" required class="papaya">
            <br>
        </div>
        
        <div class="actualiza">
                <button>Guardar</button>
                <a href="muestra.php">Volver</a>
              

        </div>
       
        </form>
        </nav>
   

</body>

</html>