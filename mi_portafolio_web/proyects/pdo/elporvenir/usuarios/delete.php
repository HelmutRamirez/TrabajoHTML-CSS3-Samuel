<?php
    require_once("../clases/class.php");
   
    $clientes= new trabajito();
    $del=$_GET["delete"];
    echo $del;
    $contenido=$clientes->delete($del);

?>   