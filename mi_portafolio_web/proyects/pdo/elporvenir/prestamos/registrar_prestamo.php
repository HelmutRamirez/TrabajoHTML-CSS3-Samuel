<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/edicion.css?ver=1.2">
    <title>Registro prestamos</title>
</head>

<body>
    <section>
        <p style="font-size: 70px; color:white; font-family:cursive">Registro de prestamo</p>
    </section>

    <form action="inserta.php" method="post">
        <nav>
            <div class="editar">

                <label for="Name" style="font-size: 30px; ">Id prestamo:</label>
                <input style="font-size: 30px; " type="text" name="id_prest" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Fecha inicio:</label>
                <input style="font-size: 30px; " type="date" name="inicio" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Fecha fin:</label>
                <input style="font-size: 30px; " type="date" name="fin" value="" required><br>

                <br>
                <label for="Name" style="font-size: 30px; ">Cantidad:</label>
                <input style="font-size: 30px;" type="text" name="canti" value="" required>
                <br>
                <br>
                <label for="Name" style="font-size: 30px; ">Valor total:</label>
                <input style="font-size: 30px;" type="text" name="total" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Valor pagado:</label>
                <input style="font-size: 30px;" type="text" name="pagado" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Estado del prestamo:</label>
                <select name="Estado_prest" id="lang" style="font-size: 30px; "required>
                     <option></option>
                    <option name="estado" value="2">En espera de aprobación:</option>
                    <option name="tipo" value="1">En espera de aprobación:</option>
                    <option name="tipo" value="3">Al dia:</option>
                    <option name="tipo" value="4">En mora:</option>
                    <option name="tipo" value="5">Paz y salvo:</option>
                </select><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Observaciones:</label><br>
                <textarea required style="font-size: 20px; width:600px; " name="observ" rows="5"></textarea>
                <br>
                <br>
                <label for="Name" style="font-size: 30px; ">Id de usuario:</label>
                <input style="font-size: 30px; " type="text" name="usuar" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Id Asociado solicitante:</label>
                <input style="font-size: 30px; " type="text" name="solicit" value="" required><br>
                <br>
                <label for="Name" style="font-size: 30px; ">Linea pestamo:</label>
                <select name="linea_prest" id="lang" style="font-size: 30px; "required>
                    <option></option>
                    <option name="tipo" value="1">Educativos:</option>
                    <option name="tipo" value="2">Educativos:</option>
                    <option name="tipo" value="3">Vacaciones:</option>
                    <option name="tipo" value="4">Libre inversión</option>
                </select><br>
                
                <br>

                <label for="Name" style="font-size: 30px;">Tasa de interes:</label>
                <input style="font-size: 30px; " type="text" name="tasa" value="" required><br>
                <br>
                <br>


                <label for="Name" style="font-size: 30px; ">Modalida del prestamo:</label>
                <select name="modalidad" id="lang" style="font-size: 30px; ">
                    <option></option>
                    <option value="1">Mes vencido</option>
                    <option value="2">Mes anticipado</option>
                </select>
                <br>
                <br>

                <label for="Name" style="font-size: 30px; ">Id empresa:</label>
                <input style="font-size: 30px; " type="text" name="empresa" value="" required><br>
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