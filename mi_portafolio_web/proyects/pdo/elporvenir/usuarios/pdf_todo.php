<?php
require_once("../fpf/fpdf.php");

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(180, 8, "Usuarios registrados en el sistema", 0, 1, 'C');
        $this->Cell(180, 8, "Reporte de usuarios", 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 8, utf8_decode('Página: ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$base = new PDO("mysql:host=localhost;dbname=elporvenir", "root", "");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$base->exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM usuario, tipo_doc, tipo_asociados_socios, estado_usu WHERE usuario.id_estado_usuario = estado_usu.id_estado_usuario AND usuario.id_tipo_usuario = tipo_asociados_socios.id_tipo_usuario and tipo_doc.id_tipo_doc = usuario.id_tipo_doc;";
$resultado = $base->query($sql);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 13);

while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
    $imgFileName = $cliente["imagenk"]; 
    $imgPath = "../imgs/imagenes/" . $imgFileName;
    $v1 = $cliente["id_usuario"];
    $v2 = $cliente["identidad_usuario"];
    $v3 = $cliente["descri_tipo_doc"];
    $v4 = $cliente["nombre_usuario"];
    $v5 = $cliente["apellido_usuario"];
    $v6 = $cliente["telef_usuario"];
    $v7 = $cliente["direcc_usuario"];
    $v8 = $cliente["correo_usuario"];
    $v9 = $cliente["usuario_sistema"];
    $v10 = "***********";
    $v11 = $cliente["descripcion_estado"];
    $v12 = $cliente["descr_asociado"];

    $pdf->Image($imgPath, 10, $pdf->GetY(), 60); 

    $pdf->MultiCell(0, 10, "\n\n\n\n\n\n\nID: $v1\nIdentidad: $v2\nTipo de Documento: $v3\nNombre: $v4\nApellido: $v5\nTelefono: $v6\nDireccion: $v7\nCorreo: $v8\nUsuario: $v9\nContrasena: $v10\nEstado: $v11\nAsociado: $v12\n", 1, 'L');
    $pdf->AddPage();
}

$pdf->Output();
?>
