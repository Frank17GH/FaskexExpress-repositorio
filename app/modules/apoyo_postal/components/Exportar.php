<?php
$idord=$_GET['id'];
$mbd = new PDO("mysql:host=localhost;dbname=fasktech_sistema", "fasktech_sistema", "vR_LQ3#W]haa");
$consulta = $mbd->prepare("SELECT a.idapoyo,a.item,c.tipo_entrega as entrega,ap_empresa,a.persona,a.direccion,a.referencia,a.telefono,ap_departamento,ap_provincia,ap_distrito,ap_ubigeo,ap_codpostal,ap_cargo,ap_codigo,ap_peso,observaciones FROM `apoyo_postal` a join cotizacion_det c on a.idservicio = c.iddet WHERE a.idorden=".$idord); 
$consulta->execute();
while($row = $consulta->fetch(PDO::FETCH_OBJ)){
        $lista_usuarios[] =$row;
    }  
$Nom=$_GET['code'];
$Coti=$_GET['cotiza'];
$Fech=$_GET['fecha'];
$Client=$_GET['cliente'];
$Servicio=$_GET['servicio'];

if (PHP_SAPI == 'cli')  
    die('This example should only be run from a Web Browser');
    require_once("./../components/Classes/PHPExcel.php");
    $objPHPExcel = new PHPExcel();
    /* Propiedades del documento */
    $objPHPExcel->getProperties()
        ->setCreator("Maarten Balliauw")
        ->setLastModifiedBy("Maarten Balliauw")
        ->setTitle("Office 2007 XLSX Test Document")
        ->setSubject("Office 2007 XLSX Test Document")
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
        ->setKeywords("office 2007 openxml php")
        ->setCategory("Test result file");    
         
    /* Libreria excel */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);
        date_default_timezone_set('Europe/London');
$cc=10;

 foreach($lista_usuarios as $r) {
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$cc, $r->idapoyo)
                ->setCellValue('B'.$cc, $r->entrega)
                ->setCellValue('C'.$cc, $r->ap_empresa)
                ->setCellValue('D'.$cc, $r->persona)
                ->setCellValue('E'.$cc, $r->direccion)
                ->setCellValue('F'.$cc, $r->referencia)
                ->setCellValue('G'.$cc, $r->telefono)
                ->setCellValue('H'.$cc, $r->ap_departamento)
                ->setCellValue('I'.$cc, $r->ap_provincia)
                ->setCellValue('J'.$cc, $r->ap_distrito)
                ->setCellValue('K'.$cc, $r->ap_ubigeo)
                ->setCellValue('L'.$cc, $r->ap_codpostal)
                ->setCellValue('M'.$cc, $r->ap_cargo)
                ->setCellValue('N'.$cc, $r->ap_codigo)
                ->setCellValue('O'.$cc, $r->ap_peso)
                ->setCellValue('P'.$cc, $r->observaciones)
                ;
               $cc++; 
    }
/*Cabecera*/
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A9', 'Cod.')
            ->setCellValue('B9', 'Entrega')
            ->setCellValue('C9', 'Empresa')
            ->setCellValue('D9', 'Destinatario')
            ->setCellValue('E9', 'Dirección')
            ->setCellValue('F9', 'Referencia')
            ->setCellValue('G9', 'Teléfono')
            ->setCellValue('H9', 'Departamento')
            ->setCellValue('I9', 'Provincia')
            ->setCellValue('J9', 'Distrito')
            ->setCellValue('K9', 'Ubigeo')
            ->setCellValue('L9', 'Cod.Postal')
            ->setCellValue('M9', 'Cargo')
            ->setCellValue('N9', 'Código')
            ->setCellValue('O9', 'Peso')
            ->setCellValue('P9', 'Nota');

    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B1', 'FASKEX S.A.C ')
            ->setCellValue('B2', 'NOTA:  No modificar el formato, llenar los espacios (DNI, Apellidos y Nombres - Direccion - Distrito - telefono).')
            ->setCellValue('B4', 'COTIZACION:')
            ->setCellValue('C4', utf8_encode($Coti))
            ->setCellValue('B5', 'ORDEN:')
            ->setCellValue('C5', utf8_encode($Nom))
            ->setCellValue('B6', 'FECHA:')
            ->setCellValue('C6', date("d/m/Y", strtotime($Fech)))
            ->setCellValue('B7', 'CLIENTE:')
            ->setCellValue('C7', utf8_encode($Client))
            ->setCellValue('E4', utf8_encode($Servicio));
    
/* Estilos */
    $sheet = $objPHPExcel->getActiveSheet();
    $border_style= array( 'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    ),'borders' => array('alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),'allborders' => array('style' => 
    PHPExcel_Style_Border::BORDER_MEDIUM,'color' => array('argb' => '000000'),)));

    $border_style2= array('borders' => array('alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),'allborders' => array('style' => 
    PHPExcel_Style_Border::BORDER_MEDIUM,'color' => array('argb' => '000000'),)));
/* BORDE TOTAL */
    $sheet->getStyle("B1:G7")->applyFromArray($border_style);
    $sheet->getStyle("A9:P".($cc-1))->applyFromArray($border_style);     

/* DIVISION DE CELDAS */
    $objPHPExcel->getActiveSheet()->mergeCells('B1:G1')
                    ->mergeCells('B2:G3')
                    ->mergeCells('C4:D4')
                    ->mergeCells('C5:D5')
                    ->mergeCells('C6:D6')
                    ->mergeCells('E4:G6')
                    ->mergeCells('C7:G7');
/* CENTRADO DE CELDAS */                    
    $sheet->getStyle('B2:G3')->getAlignment()->setWrapText(true);     

    $objPHPExcel->getActiveSheet()->getStyle("B4:B7")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("B1:B1")->getFont()->setBold(true);

    $objPHPExcel->getActiveSheet()->getStyle('B2')
    ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $objPHPExcel->getActiveSheet()->getStyle('C4:C7')
    ->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);

/*COLOR*/

    $estiloTituloColumnas = array(
    'font' => array(
    'name'  => 'Arial',
    'bold'  => true,
    'size' =>10,
    'color' => array(
    'rgb' => 'FFFFFF'
    )
    ),
    'fill' => array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '16365C')
    ),
    'borders' => array(
    'allborders' => array(
    'style' => PHPExcel_Style_Border::BORDER_THIN
    )
    ),
    'alignment' =>  array(
    'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    );

$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('B4:B7')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('A9:p9')->applyFromArray($estiloTituloColumnas);
        
/* tamano de columnas*/    
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(36);    
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(18);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
                                        
/* CONTRASENA */
    $sheet->getProtection()->setPassword('fran'); 
    $sheet->getProtection()->setSheet(true); 
    $sheet->getStyle('C10:R100')->getProtection()->setLocked(PHPExcel_Style_Protection::PROTECTION_UNPROTECTED);
/* Rename worksheet */
    $objPHPExcel->getActiveSheet()->setTitle('Simple');
    $objPHPExcel->setActiveSheetIndex(0);
/*Guardar Archivo*/
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="BD-'.$Nom.'.xlsx"'); 
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
/* If you're serving to IE over SSL, then the following may be needed */
    header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
    header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header ('Pragma: public'); // HTTP/1.0

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
exit;
?>