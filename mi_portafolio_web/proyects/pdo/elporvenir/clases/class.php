<?php

class trabajito
{
    public function reading()
    {
        try 
        {
            $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "Select * from usuario,tipo_doc, tipo_asociados_socios,estado_usu where usuario.id_estado_usuario=estado_usu.id_estado_usuario 
            and usuario.id_tipo_usuario=tipo_asociados_socios.id_tipo_usuario and tipo_doc.id_tipo_doc=usuario.id_tipo_doc;";
            $resultado = $base->prepare($sql);
            $resultado->execute();

            return $resultado; 
        }     
        catch(Exception $e)
        {
            die('Error de conexión: '.$e->getMessage());
        }
    }
    public function reading5($bud)
    {
        #Mostrar todos los datos  
        try 
        {

            $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "Select * from usuario, tipo_doc,tipo_asociados_socios,estado_usu where usuario.id_estado_usuario=estado_usu.id_estado_usuario 
            and usuario.id_tipo_usuario=tipo_asociados_socios.id_tipo_usuario and tipo_doc.id_tipo_doc=usuario.id_tipo_doc and usuario.id_usuario=$bud;";
            $resultado = $base->prepare($sql);
            $resultado->execute();
            return $resultado; 
               
            }     
        
        catch(Exception $e)
        {
            die('Error de conexion'.$e->GetMessage());
        }
        finally{
            $base=null;
        }
    }
    public function insertar($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$nombre)
        {

            try {
                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "insert into usuario values('$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9',:clave,'$v11','$v12',:imagen)";
                $resultado = $base->prepare($sql);
                $resultado->bindparam(":imagen",$nombre);
                $resultado->bindparam(":clave",$v10);
                $resultado->execute();
        
                
                $resultado->closeCursor();
                echo "<script language='JavaScript'> 
                    alert('Datos Guardados Correctamente'); location.assign('muestra.php')</script>";
               
            }
            catch(Exception $e)
            {
                die('Error de conexion'.$e->GetMessage());
            }
            finally{
                $base=null;
            }
        }
        public function delete($v1)
        {

            try {
                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "DELETE FROM usuario WHERE id_usuario='$v1';";
                $resultado = $base->prepare($sql);
                $resultado->execute();
                $resultado->closeCursor();
                echo "<script language='JavaScript'> 
                    alert('Datos eliminados correctamente'); location.assign('muestra.php')</script>";
               
            }
            catch(Exception $e)
            {
                die('Error de conexion'.$e->GetMessage());
            }
            finally{
                $base=null;
            }
        }
        public function busque1($valor)
        {
            #actualizar
            try 
            {

                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "select * from usuario,tipo_doc,estado_usu,tipo_asociados_socios where usuario.id_estado_usuario=estado_usu.id_estado_usuario 
                and usuario.id_tipo_usuario=tipo_asociados_socios.id_tipo_usuario and  tipo_doc.id_tipo_doc=usuario.id_tipo_doc and id_usuario=$valor;";
                $resultado = $base->prepare($sql);
                $resultado->execute();
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="../estilos/edicion.css?ver=1.2">
                        <title>Update</title>
                    </head>
                    <body>
                            <form action="modificar.php" method="post" enctype="multipart/form-data">
                    <section> <p style="font-size: 70px; color:white; font-family:cursive">Actualizar datos de usuario</p></section>
                    
                    <nav>
                   
                            
                            
                            
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
                                   
                                    
                                }
                                ?>
                                 <div class="editar">
                   
                                        <label for="Name"style="font-size: 30px; ">Id usuario:</label>
                                        <input style="font-size: 30px; " type="text" name="identi" value="<?php echo $id ;?>"  readonly><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Documento:</label>
                                        <input style="font-size: 30px; " type="text" name="docu" value="<?php echo $doc ;?> "required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Tipo documento actual :</label>
                                        <input style="font-size: 30px; " type="text" name="tipo" value="<?php echo $nom ;?>"required><br>

                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Nuevo tipo documento:</label>
                                        <select name="tipo" id="lang" style="font-size: 30px;"required>
                                            <option ></option>
                                            <option name="Tarjeta identidad" value="1">Tarjeta identidad</option>
                                            <option name="Cedula de ciudadania" value="2">Cedula de ciudadania</option>
                                            <option name="Pasaport" value="3">Pasaporte</option>
                                        </select></td><br>
                                        
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Nombre:</label>
                                        <input style="font-size: 30px;" type="text" name="nombre" value="<?php echo $apelli;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Apellido:</label>
                                        <input style="font-size: 30px;" type="text" name="apellido" value="<?php echo $tel;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Telefono:</label>
                                        <input style="font-size: 30px; " type="text" name="telefono" value="<?php echo $corre ;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Direccion:</label>
                                        <input style="font-size: 30px; " type="text" name="direcc" value="<?php echo $clav1 ;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Correo:</label>
                                        <input style="font-size: 30px; " type="text" name="correo" value="<?php echo $clav2 ;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Usuario sistema:</label>
                                        <input style="font-size: 30px; " type="text" name="usuario" value="<?php echo $clav3;?>"required><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Contraseña:</label>
                                        <input style="font-size: 30px; " type="password" name="clave" value=""><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Estado actual usuario:</label>
                                        <input style="font-size: 30px; " type="text"  value="<?php echo $clav5 ;?>"><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Nuevo estado usuario:</label>

                                        <select name="Estado" id="lang"style="font-size: 30px; ">
                                            <option ></option>
                                            <option name="estado" value="1">Activo:</option>
                                            <option name="tipo" value="5">Inactivo:</option>  
                                        </select><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Tipo usuario actual:</label>
                                        <input style="font-size: 30px; " type="text" value="<?php echo $clav6 ;?>"><br>
                                        <br>
                                        <label for="Name"style="font-size: 30px; ">Nuevo tipo usuario:</label>
                                        <select name="Tipousuario" id="lang"style="font-size: 30px; ">
                                            <option ></option>
                                            <option value="6">Socio</option>
                                            <option value="8">Asociado</option>
                                        </select><br>

                                        <label for="Name" style="font-size: 30px; ">Imagen actual:</label><br>
                                        <div class="imagenn">
                                            
                                            <img src="../imgs/imagenes/<?php echo $img ?>"><br> 
                                            <input   type="hidden" name="post" value="<?php echo $img ;?>" >  
                                         
                                            <label for="Name" style="font-size: 30px; ">¿Desea actualizar la imagen?:</label>
                                            <select name="actu" id="lang"style="font-size: 25px; ">
                                                <option value="2">No</option>
                                                <option value="1">Si</option>
                                                
                                            </select>
                                            <input  style="font-size: 20px; " type="file" name="imagen" size="20" class="papaya">    
                                             <br>
                                             <br>
                                             <br>
                                             <br>
                                            
                                             </div> 
                        
                                             <div class="actualiza">
                <button>Actualizar</button>
                <a href="muestra.php">Volver</a>

        </div>
       
        </form>
        </nav>
    
                    </body>
                    </html>
                                
                    <?php  
            }
            catch(Exception $e)
            {
                die('Error de conexion'.$e->GetMessage());
            }
            finally{
                $base=null;
            }
        }
        public function update($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$v10,$v11,$v12,$nombre)
        {

            try {
                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "UPDATE usuario SET identidad_usuario='$v2',id_tipo_doc='$v3',nombre_usuario='$v4',apellido_usuario='$v5',
                telef_usuario='$v6',direcc_usuario='$v7',correo_usuario='$v8',usuario_sistema='$v9',password_usuario=:clave,
                id_estado_usuario='$v11',id_tipo_usuario='$v12',imagenk=:imagen where id_usuario=$v1;";
                $resultado = $base->prepare($sql);
                $resultado->bindparam(":imagen",$nombre);
                $resultado->bindparam(":clave",$v10);
                $resultado->execute();
                $resultado->closeCursor();
                
                echo "<script language='JavaScript'> 
                    alert('Datos actualizados correctamente'); location.assign('muestra.php')</script>";
               
            }
            catch(Exception $e)
            {
                die('Error de conexion'.$e->GetMessage());
            }
            finally{
                $base=null;
            }
        }
        public function busqueda($valor)
        {
            
                #buscar datos
            try 
            {

                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "select * from usuario,tipo_doc,estado_usu,tipo_asociados_socios where usuario.id_estado_usuario=estado_usu.id_estado_usuario 
                and usuario.id_tipo_usuario=tipo_asociados_socios.id_tipo_usuario and usuario.id_tipo_doc=tipo_doc.id_tipo_doc  and usuario.id_usuario=$valor;";
                $resultado = $base->prepare($sql);
                $resultado->execute();
            if ($resultado !== false) 
            {
            
                    
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../estilos/mostrar.css?ver=1.3">
                    <title>Update</title>
                </head>
                <section> <p style="font-size: 70px; color:white; font-family:cursive">Datos que coinciden</p></section>
                
                <body>
                        <form action="modificar.php" method="post">
                <nav>
                <table >
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
                                
                               
                               ?>
                                        
            
                            
                         <tr>
                  
                                
                                <td ><?php echo $id ;?></td>
                                <td ><?php echo $doc ;?></td>
                             
                                <td ><?php echo $apelli;?></td>
                                <td ><?php echo $tel ;?></td>
                               
                                <td ><?php echo $clav2 ;?></td>
                                <td ><?php echo $clav3;?></td>
                              
                                <td ><?php echo $clav5 ;?></td>
                            
                                <td><?php echo $clav6 ;?></td>
                                <div class="botones">
                                    <td><?php echo "<a href='vertodo.php?buscarrr=".$id."'?>Ver todos los datos</a>";?></td>
                                    <td><?php echo "<a href='enlace2.php?busqueda=".$id."'?>Editar datos</a>";?></td>
                                    <td><?php echo "<a href='delete.php?delete=".$id."'?>Borrar</a>";?></td>
                                    
                                    <td><?php echo "<a href='pdfs.php?buscar2=".$id."'?>Generar pdf</a>";?></td>
                                    
                                </div>
                                </select></td>    
                        </tr>
                        <?php
                               }
                        ?>
                    </table>
                    <div class="actualiza">
                <button>Actualizar</button>
                <a href="muestra.php">Volver</a>

        </div>
       
        </form>
        </nav>
       
                </body>
                </html>
                               
    <?php        
            
               
            }else {
            
                echo "Ocurrió un error al recuperar los datos.";
            }     
         
    
        $resultado->closeCursor();
        }
        catch(Exception $e)
        {
            die('Error de conexion'.$e->GetMessage());
        }
        finally{
            $base=null;
        }
    }
    public function clavee($usu,$cont)
    {

        try {
            $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            

            $sql = "SELECT * from usuario where correo_usuario='$usu' or usuario_sistema='$usu'";
            $resultado = $base->prepare($sql);
            $resultado->execute();
    
            

            while ($contenido=$resultado->fetch(PDO::FETCH_ASSOC))
                               {
                               
                                $clav3=$contenido["usuario_sistema"];
                                $clav4=$contenido["password_usuario"];
                                $clav52=$contenido["id_estado_usuario"];   
                                
                              
            if (password_verify($cont,$clav4)) 
            {
                if($clav52==1)
                {
                    
                    echo "<script language='JavaScript'> 
                    alert('La contraseña es válida!'); location.assign('./index.php')</script>";
               
                }
                else
                {
                   
                    echo "<script language='JavaScript'> 
                    alert('El usuario esta inactivo'); location.assign('./inicio.php')</script>";
               
                }
                               
            } 
            else {
                echo 'La contraseña no es válida.';

                }
            }                                
            $resultado->closeCursor();
           
        }
        catch(Exception $e)
        {
            die('Error de conexion'.$e->GetMessage());
        }
        finally{
            $base=null;
        }
    }
}
?>