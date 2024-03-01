<?php
    require_once("../clases/class_tipo_docu.php");
   
    $clientes= new tipo_docu();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   