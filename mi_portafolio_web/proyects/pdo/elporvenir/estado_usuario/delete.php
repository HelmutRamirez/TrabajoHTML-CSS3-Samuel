<?php
    require_once("../clases/class_estado_usu.php");
   
    $clientes= new estado_usuario();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   