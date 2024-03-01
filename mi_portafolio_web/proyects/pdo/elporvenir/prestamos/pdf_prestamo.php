<?php
require_once("../fpf/fpdf.php");

class PDF extends FPDF
{
    public function Header()
    {
        $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $busca = $_GET["pdf_prestamo"];
        $sql = "SELECT * FROM usuario,prestamo WHERE 
            usuario.id_usuario=prestamo.id_usuario and
            usuario.id_usuario=$busca;";
        $resultado = $base->query($sql);
        while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $fecha_actual = date("d-m-Y"); 
           
            $v4 = $cliente["nombre_usuario"];
            $v5 = $cliente["apellido_usuario"];
        }

        $this->SetFont('Arial', 'B', 15);
        $this->MultiCell(0, 8, utf8_decode("\n\nBogotá, $fecha_actual"), 0, 'R');
        
        $this->SetFont('Arial', '', 15);
        
        $this->MultiCell(0, 8, utf8_decode("\nSeñor@:  $v4 $v5"), 0, 'L');
        $this->MultiCell(0, 8, utf8_decode("\nCordial saludo."), 0, 'L');
        
        
    }

    function Footer()
    {
        $base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $busca = $_GET["pdf_prestamo"];
        $sql = "SELECT * FROM prestamo,empresa, usuario WHERE 
            empresa.id_empresa = prestamo.id_empresa and
            usuario.id_usuario=prestamo.id_usuario;";
        $resultado = $base->query($sql);
        while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $empr1=$cliente["nit_empresa"];
            $empr2=$cliente["nombre_empresa"];
            $empr3=$cliente["telefono_empresa"];
            $empr4=$cliente["correo_empresa"];
            $empr5=$cliente["direccion_empresa"];
        }
        $this->SetY(-80);
        $this->SetFont('Arial', 'I', 12);
        $this->SetAutoPageBreak(false);

       
       
        $lineHeight = 5; 

        $this->MultiCell(0, 5, utf8_decode("\n\n\n\n _______________________________________ "), 0, 'L');
        $this->MultiCell(0, $lineHeight, "\n    Director general", 0, 'L');
        $this->MultiCell(0, 1, "\n    TEL:312415455", 0, 'L');
        $this->MultiCell(0, 2, "\n    Email: Director@gmail.com", 0, 'L');
        $this->SetY(-30);
        $this->MultiCell(0, $lineHeight, "$empr2", 0, 'C');
        $this->MultiCell(0, $lineHeight, "$empr5", 0, 'C');
        $this->MultiCell(0, $lineHeight, "TEl: $empr3", 0, 'C');
        $this->MultiCell(0, $lineHeight, "NIT: $empr1", 0, 'C');
        
    }
}






$base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $busca = $_GET["pdf_prestamo"];
        $sql = "SELECT * FROM usuario,prestamo,empresa,modalidad_prestamo,linea_prestamo,estado_prestamo, tipo_doc, tipo_asociados_socios, estado_usu WHERE 
            usuario.id_estado_usuario = estado_usu.id_estado_usuario AND 
            usuario.id_tipo_usuario = tipo_asociados_socios.id_tipo_usuario and 
            tipo_doc.id_tipo_doc = usuario.id_tipo_doc and 
            empresa.id_empresa = prestamo.id_empresa and
            prestamo.id_modalidad_prestamo=modalidad_prestamo.id_modalidad_prestamo and
            prestamo.id_linea_prestamo=linea_prestamo.id_linea_prestamo and
            estado_prestamo.id_estado_prestamo=prestamo.id_estado_prestamo and
            prestamo.id_usuario = usuario.id_usuario and
            usuario.id_usuario=$busca;";
        $resultado = $base->query($sql);
while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $prest1 = $cliente["id_prestamo"];
    $prest= $cliente["fecha_inicio"];
    $prest2 = $cliente["fecha_final"];
    $prest3 = $cliente["prestamo_cantidad"];
    $prest4 = $cliente["prestamo_valor_total"];
    $prest5 = $cliente["prestamo_valor_pagado"];
    $prest6 = $cliente["descr_estado_prestamo"];
    $prest7 = $cliente["observaciones_prestamo"];
    $prest8 = $cliente["id_asociado_solicitante"];
    $prest9 = $cliente["tasa_interes"];
    $prest10 = $cliente["descr_modalidad"];
    $prest11 = $cliente["descr_linea_prestamo"];
    $prest12 = $cliente["id_empresa"];
    
    #'``telefono_empresa``direccion_empresa`
    
    $v1 = $cliente["id_usuario"];
    $v2 = $cliente["identidad_usuario"];
    $v3 = $cliente["descri_tipo_doc"];
    $v4 = $cliente["nombre_usuario"];
    $v5 = $cliente["apellido_usuario"];
    $v6 = $cliente["telef_usuario"];
    $v7 = $cliente["direcc_usuario"];
    $v8 = $cliente["correo_usuario"];
    $v11 = $cliente["descripcion_estado"];
    $v12 = $cliente["descr_asociado"];
    $imgPath = "../imgs/firma.png";
}

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 15);

    $pdf->MultiCell(0, 8, utf8_decode("\n\n\nPor medio del presente se le hace notificar al señor $v4 $v5, identificado con $v3 número $v2, sobre la solicitud del préstamo con id: $prest1 de tipo: $prest11 por un monto de: $$prest3, el cual tendrá una modalidad de: $prest10 con una tasa de interés del: $prest9%. El estado actual del préstamo es:$prest6, en caso de ser aprovado iniciará el: $prest y finalizará el: $prest2."), 0, 'L');
    $pdf->MultiCell(0, 8, utf8_decode("\n Observaciones del prestamo: $prest7 "), 0, 'L');
    $pdf->MultiCell(0, 8, utf8_decode("\n Agradecemos su atención atentamente: "), 0, 'L');
    
    $pdf->Image($imgPath, 30, $pdf->GetY() +30, 60); 
    

$pdf->Output();
?>
