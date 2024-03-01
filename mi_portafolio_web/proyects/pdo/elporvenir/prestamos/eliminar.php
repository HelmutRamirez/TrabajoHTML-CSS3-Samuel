<?php
    require_once("../clases/class_prestamo.php");
   
    $clientes= new prestamo();
    $del=$_GET["delete"];
    echo $del;
    $contenido=$clientes->delete($del);

?>   