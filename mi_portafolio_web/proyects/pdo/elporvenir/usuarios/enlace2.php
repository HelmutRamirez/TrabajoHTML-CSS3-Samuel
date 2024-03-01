<?php
        require_once("../clases/class.php");
        
        $clientes= new trabajito();
        $v2=$_GET['busqueda'];
    
        $contenido=$clientes->busque1($v2); 
      
   
?>