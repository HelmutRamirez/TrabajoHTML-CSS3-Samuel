<?php
    require_once("../clases/class_moda_prest.php");
   
    $clientes= new modalidad_prestamo();
    $del=$_GET["dele"];
    $contenido=$clientes->delete1($del);

?>   