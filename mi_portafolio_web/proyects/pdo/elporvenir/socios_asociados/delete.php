<?php
    require_once("../clases/class_soci.php");
   
    $clientes= new socio_asociado();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   