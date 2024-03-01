<?php
        require_once("../clases/class.php");
        
        $clientes= new trabajito();
        $v2=$_POST["busqueda"];
      
        $contenido=$clientes->busqueda($v2); 
         
 ?>
