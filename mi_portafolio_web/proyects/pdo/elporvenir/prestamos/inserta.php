<?php
    
    require_once("../clases/class_prestamo.php");
    $clientes= new prestamo();
           
            $v1=$_POST["id_prest"];
            $v2=$_POST["inicio"];
            $v3=$_POST["fin"];
            $v4=$_POST["canti"];
            $v5=$_POST["total"];
            
            $v7=$_POST["pagado"];
            $v8=$_POST["Estado_prest"];
            $v9=$_POST["observ"];
            $v10=$_POST["usuar"];
            $v11=$_POST["solicit"];
            $v12=$_POST["linea_prest"];
            $v13=$_POST["tasa"];
            $v14=$_POST["modalidad"];
            $v15=$_POST["empresa"];
            

            $contenido=$clientes->insertar($v1,$v2,$v3,$v4,$v5,$v7,$v8,$v9,$v10,$v11,$v12,$v13,$v14,$v15);

?>