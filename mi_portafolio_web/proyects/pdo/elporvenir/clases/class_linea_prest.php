<?php

class linea_prestamo
{
    public function inserta($v1,$v2)
    {
    try {
        $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        

        $sql = "INSERT into linea_prestamo values(:ide,:descr)";
        $resultado = $base->prepare($sql);
        $resultado->bindparam(":ide",$v1);
        $resultado->bindparam(":descr",$v2);
        $resultado->execute();

        
        $resultado->closeCursor();
        echo "<script language='JavaScript'> 
            alert('Datos Guardados Correctamente');location.assign('mostrar.php')</script>";
       
    }
    catch(Exception $e)
    {
        die('Error de conexion'.$e->GetMessage());
    }
    finally{
        $base=null;
    }
    }
    public function leeer()
    {
        try 
        {
            $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "SELECT * from linea_prestamo";
            $resultado = $base->prepare($sql);
            $resultado->execute();

            return $resultado; 
        }     
        catch(Exception $e)
        {
            die('Error de conexión: '.$e->getMessage());
        }
    }
    public function leeer1($v1)
    {
        try 
        {
            $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "SELECT * from linea_prestamo where id_linea_prestamo =$v1";
            $resultado = $base->prepare($sql);
            $resultado->execute();

            return $resultado; 
        }     
        catch(Exception $e)
        {
            die('Error de conexión: '.$e->getMessage());
        }
    }

    public function update1($v1,$v2)
    {

        try {
            $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");
            

            $sql = "UPDATE linea_prestamo SET descr_linea_prestamo='$v2' where id_linea_prestamo =$v1;";
            $resultado = $base->prepare($sql);
            $resultado->execute();
            $resultado->closeCursor();
            
            echo "<script language='JavaScript'> 
                alert('Datos actualizados correctamente23'); location.assign('mostrar.php')</script>";
           
        }
        catch(Exception $e)
        {
            die('Error de conexion'.$e->GetMessage());
        }
        finally{
            $base=null;
        }
    }
    public function delete1($v1)
        {

            try {
                $base =new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $base->exec("SET CHARACTER SET utf8");
                

                $sql = "DELETE FROM linea_prestamo WHERE id_linea_prestamo ='$v1';";
                $resultado = $base->prepare($sql);
                $resultado->execute();
                $resultado->closeCursor();
                echo "<script language='JavaScript'> 
                    alert('Datos eliminados correctamente'); location.assign('mostrar.php')</script>";
               
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