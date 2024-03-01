<?php      
        require_once("./clases/class.php");

        $clientes= new trabajito();

        $usua=$_POST['usuario'];
        
        $contra=$_POST['contra'];
        
        $contenido=$clientes->clavee($usua,$contra)
              
 ?>
