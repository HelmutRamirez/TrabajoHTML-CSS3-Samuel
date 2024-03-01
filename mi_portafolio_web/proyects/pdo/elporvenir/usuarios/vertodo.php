<?php
require_once("../clases/class.php");


$cliente= new trabajito();
    $valor=$_GET['buscarrr'];
    $resultado=$cliente->reading5($valor);

if ($resultado !== false) { 
?>
 <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../estilos/todosdatos.css?ver=1.1">
                    <title>Update</title>
                </head>
                <body>
                        <form action="modificar.php" method="post">
                <section> <p style="font-size: 70px; color: white; font-family: cursive">Todos los datos</p></section>
                <nav>
                <table >
                          <tr>     
                                    <th colspan="1"><p>Id usuario</p></th>
                                    
                                    <th colspan="1"><p>Documento</p></th>
                                    <th colspan="1"><p>Tipo de documento actual</p></th>
                                   
                                    <th colspan="1"><p>Nombre</p></th>
                                    <th colspan="1"><p>Apellido</p></th>
                                    <th colspan="1"><p>Telefono</p></th>
                                    <th colspan="1"><p>Direccion</p></th>
                                    <th colspan="1"><p>Correo</p></th>
                                    <th colspan="1"><p>Usuario sistema</p></th>
                                    <th colspan="1"><p>Contraseña</p></th>
                                    <th colspan="1"><p>Estado actual usuario</p></th>
                                    <th colspan="1"><p>Tipo usuario actual</p></th>
                                    <th colspan="1"><p>Imagen</p></th>
                                    <th colspan="4"><p>Opciones</p></th>
                          </tr>   
                         
                         
                            <?php
                            while ($contenido=$resultado->fetch(PDO::FETCH_ASSOC))
                               {
                                $id=$contenido["id_usuario"];
                                $doc=$contenido["identidad_usuario"];
                                $nom=$contenido["descri_tipo_doc"];
                                $apelli=$contenido["nombre_usuario"];
                                $tel=$contenido["apellido_usuario"];
                                $corre=$contenido["telef_usuario"];
                                $clav1=$contenido["direcc_usuario"];
                                $clav2=$contenido["correo_usuario"];
                                $clav3=$contenido["usuario_sistema"];
                                $clav4=$contenido["password_usuario"];
                                $clav5=$contenido["descripcion_estado"];
                                $clav6=$contenido["descr_asociado"];
                                $img=$contenido["imagenk"];
                               ?>

                         <tr>

                                <td ><?php echo $id ;?></td>
                                <td ><?php echo $doc ;?></td>
                                <td ><?php echo $nom ;?></td>
                                <td ><?php echo $apelli;?></td>
                                <td ><?php echo $tel ;?></td>
                                <td ><?php echo $corre ;?></td>
                                <td ><?php echo $clav1;?></td>
                                <td ><?php echo $clav2 ;?></td>
                                <td ><?php echo $clav3;?></td>
                                <td >*********</td>
                                <td ><?php echo $clav5 ;?></td>
                                <td><?php echo $clav6 ;?></td>
                                <div class="imagenk">
                                <td><img src="../imgs/imagenes/<?php echo $img ?>" width=100px height="100px"></img></td>
                                </div>
                                <div class="botones">
                                <td><?php echo "<a href='enlace2.php?busqueda=".$id."'?> Editar datos </a>";?></td>
                                <td><?php echo "<a href='delete.php?delete=" . $id . "' onclick='return confirmarBorrar();'>Borrar</a>"; ?></td>
                    <script>function confirmarBorrar() {return confirm("¿Estás seguro de que deseas borrar este elemento?");}</script>
                    <td><?php echo "<a href='pdfs.php?buscar2=" . $id . "'>Generar pdf</a>"; ?></td>
                                </div>

                                </select></td>    
                        </tr>
                        <?php
                               }

                        ?>
                       
                    </table>
                    </form> 
                     </nav> 
                    <div class="actualiza"> 
                        <a href="muestra.php">volver</a>
                   
                    </div> 
                   
                </body>
                </html>
                <?php
} else {
    
    echo "Ocurrió un error al recuperar los datos.";
}
?>