<?php
require_once("../clases/class.php");

$conteni= new trabajito();


$actu=$_POST["actu"];
if ($actu==1)
{
    if ($tama<3200000)
    {
            if($tipo=="image/jpg" || $tipo=="image/jpeg" || $tipo=="image/png" ||$tipo=="image/gif")
            {

                $carpeta=$_SERVER['DOCUMENT_ROOT'].'/elporvenir/imgs/imagenes/';
                move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta.$nombre);
                $v1=$_POST["identi"];
                $v2=$_POST["docu"];
                $v3=$_POST["tipo"];
                $v4=$_POST["nombre"];
                $v5=$_POST["apellido"];
                $v6=$_POST["telefono"];
                $v7=$_POST["direcc"];
                $v8=$_POST["correo"];
                $v9=$_POST["usuario"];
                $v10=$_POST["clave"];
                $v11=$_POST["Estado"];
                $v12=$_POST["Tipousuario"];

                $encrip=password_hash($v10,PASSWORD_DEFAULT,['cost'=>15]);
                $nombre=$_FILES['imagen']['name'];
                $clientes=new trabajito();
                $contenido=$clientes->update($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$encrip,$v11,$v12,$nombre);
                
                
            }
            else
            {
                echo "<script language='JavaScript'> 
                    alert('Archivo equivocado'); location.assign('muestra.php')</script>";
               
                
            }
    }
    else
    {
        echo "<script language='JavaScript'> 
        alert('Tamaño muy grande'); location.assign('muestra.php')</script>";
   
    }
}
else{

                $v1=$_POST["identi"];
                $v2=$_POST["docu"];
                $v3=$_POST["tipo"];
                $v4=$_POST["nombre"];
                $v5=$_POST["apellido"];
                $v6=$_POST["telefono"];
                $v7=$_POST["direcc"];
                $v8=$_POST["correo"];
                $v9=$_POST["usuario"];
                $v10=$_POST["clave"];
                $v11=$_POST["Estado"];
                $v12=$_POST["Tipousuario"];

                $encrip=password_hash($v10,PASSWORD_DEFAULT,['cost'=>15]);
                $nombre=$_POST["post"];
                $clientes=new trabajito();
                $contenido=$clientes->update($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$encrip,$v11,$v12,$nombre);
               

}
?>