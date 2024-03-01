<?php
require_once("../clases/class_linea_prest.php");   
    $clientes= new linea_prestamo();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   