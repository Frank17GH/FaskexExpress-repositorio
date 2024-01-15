<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
	include_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
	include_once('letras.php');
	include_once "../../recursos/qr/phpqrcode/qrlib.php";
	require_once 'dompdf/autoload.inc.php';

	require_once 'components/vendor/autoload.php';


	$class = new Mod(); 	
	$emp= $class->local($_GET['c']);
	switch ($_GET['tp']) {
		case 'A4':
		    $class = new Mod(); 
		    $ts1= $class->printComp($_GET['c']);
		    $class = new Mod(); 
		    $dtprod= $class->detprod($_GET['c']);
		break;
		case 'A5':
		    $class = new Mod(); 
		    $ts1= $class->printComp($_GET['c']);
		    $class = new Mod(); 
		    $dtprod= $class->detprod($_GET['c']);
		break;
		case 'TICKET':
		    $class = new Mod(); 
		    $ts1= $class->printComp($_GET['c']);
		    $class = new Mod(); 
		    $dtprod= $class->detprod($_GET['c']);
		break;
		case 'GUIA':
			$class = new Mod(); 
		    $ts1= $class->printguia($_GET['c']); 
		    $class = new Mod(); 
		    $ts2= $class->detguia($_GET['c']);
		break;
		
		case 'ETIQUETA32':
			$class = new Mod(); 
		    $ts1= $class->etiqueta($_GET['c']); 
		    $class = new Mod(); 
		    $ts2= $class->detprod($_GET['c']);
		break;

		case 'ETIQUETA75':
			$class = new Mod(); 
		    $ts1= $class->etiqueta($_GET['c']); 
		    $class = new Mod(); 
		    $ts2= $class->detprod($_GET['c']);
		break;

		case 'CARGO':
			$class = new Mod(); 
		    $ts1= $class->etiqueta($_GET['c']); 
		    $class = new Mod(); 
		    $ts2= $class->detprod($_GET['c']);
		break;
	}

	
	use Dompdf\Dompdf;

// Introducimos HTML de prueba

	
	ob_start();
	require_once 'formatos/'.$_GET['tp'].'.php';		
	$html=ob_get_clean();
	$pdf = new DOMPDF();
	switch ($_GET['tp']) {			
		case 'A4':			
			$pdf->set_paper(array(0,0,595.28,841.89),'portrait');
			$pdf->load_html(utf8_decode($html));
			$pdf->render();					
		break;
		case 'A5':	
			
			$pdf->set_paper(array(0,0,419.53,595.28),'landscape');
			$pdf->load_html(utf8_decode($html));
			$pdf->render();
		break;		
		case 'TICKET':
			$pdf->set_paper(array(0,0,204,280));
			$pdf->load_html(utf8_decode($html));
			$pdf->render();
			$page_count = $pdf->get_canvas( )->get_page_number( ); unset( $pdf );
	 		$pdf = new DOMPDF( ); 
	 		$pdf->set_paper( array( 0 , 0 , 204 , 280* $page_count ) ); 
	 		$html .= '<link type="text/css" href="http://sistemas.faskex.com/app/modules/facturacion/formatos/dompdf.css" rel="stylesheet" />';
	 		$pdf->load_html(utf8_decode($html));
	 		$pdf->render( ); 
		break;

		case 'GUIA':
			$pdf->set_paper(array(0,0,419.53,595.28),'landscape');
			$pdf->load_html(utf8_decode($html));
			$pdf->render();
		break;

		case 'ETIQUETA32':
			$pdf->set_paper(array(0,0,300,170));
			$pdf->load_html(utf8_decode($html),'landscape');
			$pdf->render();
		break;
		case 'ETIQUETA75':
			$pdf->set_paper(array(0,0,300,170));
			$pdf->load_html(utf8_decode($html),'landscape');
			$pdf->render();
		break;
		case 'CARGO':
			$pdf->set_paper(array(0,0,300,170));
			$pdf->load_html(utf8_decode($html),'landscape');
			$pdf->render();
		break;
	}

	
	$pdf->stream('reportePdf.pdf',array('Attachment'=>0));
	