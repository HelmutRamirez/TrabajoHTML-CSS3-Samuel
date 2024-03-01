<?php
    
    require_once("../clases/class.php");
    $clientes= new trabajito();
    
    
$nombre=$_FILES['imagen']['name'];
$tipo=$_FILES['imagen']['type'];
$tama=$_FILES['imagen']['size'];

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
            $contenido=$clientes->insertar($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9,$encrip,$v11,$v12,$nombre);

            
        }
        else
        {
            echo "Archivo equivocado";
        }
}
else
{
    echo "Tamaño muy grande";
}



?>
            
               
