<?php
    require_once("../clases/class_estad_prest.php");
   
    $clientes= new estado_prestamo();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   