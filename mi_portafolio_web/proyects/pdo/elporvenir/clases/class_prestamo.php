<?php

class prestamo
{
    public function reading()
    {
        try 
        {
            $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "SELECT * from prestamo,estado_prestamo,modalidad_prestamo,linea_prestamo,empresa, usuario where 
            modalidad_prestamo.id_modalidad_prestamo=prestamo.id_modalidad_prestamo and
            linea_prestamo.id_linea_prestamo=prestamo.id_linea_prestamo and
            estado_prestamo.id_estado_prestamo=prestamo.id_estado_prestamo and
            prestamo.id_empresa=empresa.id_empresa and
            usuario.id_usuario=prestamo.id_usuario;";
            $resultado = $base->prepare($sql);
            $resultado->execute();

            return $resultado; 
        }     
        catch(Exception $e)
        {
            die('Error de conexión: '.$e->getMessage());
        }
    }
    public function delete($v1)
    {

        try {
            $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            

            $sql = "DELETE FROM prestamo WHERE id_prestamo='$v1';";
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
    public function insertar($v1,$v2,$v3,$v4,$v5,$v7,$v8,$v9,$v10,$v11,$v12,$v13,$v14,$v15)
        {

            try {
                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "INSERT into prestamo values('$v1','$v2','$v3','$v4','$v5','$v7','$v8','$v9','$v10','$v11','$v12','$v13','$v14','$v15')";
                $resultado = $base->prepare($sql);
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
        public function buscar($v1)
        {
            try 
            {
                $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
    
                $sql = "SELECT * from prestamo,estado_prestamo,modalidad_prestamo,linea_prestamo,empresa, usuario where 
                modalidad_prestamo.id_modalidad_prestamo=prestamo.id_modalidad_prestamo and
                linea_prestamo.id_linea_prestamo=prestamo.id_linea_prestamo and
                estado_prestamo.id_estado_prestamo=prestamo.id_estado_prestamo and
                prestamo.id_empresa=empresa.id_empresa and
                usuario.id_usuario=prestamo.id_usuario and
                prestamo.id_prestamo=$v1;";
                $resultado = $base->prepare($sql);
                $resultado->execute();
    
                return $resultado; 
            }     
            catch(Exception $e)
            {
                die('Error de conexión: '.$e->getMessage());
            }
        }
}
?>        