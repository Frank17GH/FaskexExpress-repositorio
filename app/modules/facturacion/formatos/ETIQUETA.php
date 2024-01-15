<?php 
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    foreach ($ts1 as $dta):    
    	$code2 = $dta[co_serie].'-'.str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT);
    	$type = "C128";
?>
<table style="width: 100%;font-family: Arial; font-size: 13px "  cellspacing="0.2" cellpadding="0.2">
	<tr>
		<td style="text-align: left; vertical-align: middle;">						
			<font style="font-size: 11px"><?php echo utf8_encode($dta[servicio]); ?><br> 
			</font>																	
		</td>
		<td style="text-align: right; vertical-align: middle;">						
			<font style="font-size: 11px"><?php echo $dta[fecha]; ?><br> 
			</font>																	
		</td>						
	</tr>

	<tr>

		<center> 
			<img src="data:image/png;base64,<?php echo base64_encode($generator->getBarcode($code2, $type)) ?>">
		</center>
	</tr>			

</table>

	<!DOCTYPE html>
		<html>
			<head>
				<title><?php echo "ETIQUETA - ".str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT); ?></title>
			</head>
			<body>
				<style>
			       @page { margin: 10px 10px; }
			       #footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 150px;}
			       #footer .page:after { content: counter(page, upper-roman); }
			     </style>	

			     <table style="width: 100%; font-size: 12px;margin-left:10px;">
			     	<tr >
			     		<td><center>
			     			<div style="letter-spacing: 15px;"><?php echo $code2; ?></div>
			     		</center>
			     			
						</td>
					</tr>
			     </table>

				<table style="width: 100%; font-size: 9px">
					
					<tr>
						<td style="width: 50px">CLIENTE</td>
						<td colspan="4">: <?php echo utf8_encode($dta[cliente]) ?></td>						
					</tr>
					<tr>
						<td style="width: 50px">DESTINATARIO</td>
						<td colspan="5">: <?php echo utf8_encode($dta[destino]) ?></td>						
					</tr>

					<tr>
						<td style="width: 50px">TELEFONO</td>
						<td>: <?php echo $dta[telefono]?></td>
					</tr>

					<tr>
						<td style="width: 5px"><?php echo utf8_encode('DIRECCIÓN') ?></td>
						<td colspan="5">: <?php echo utf8_encode($dta[de_direccion].','. $dta['distrito']  )?></td>
					</tr>
					<tr>
						<td style="width: 5px"><?php echo utf8_encode('REFERENCIA') ?></td>
						<td colspan="5">: <?php echo $dta['de_obser'] ?></td>
					</tr>
					<tr>
						<td style="width: 5px"><?php echo utf8_encode('TIPO') ?></td>
						<td colspan="3">: <?php echo $dta[servicio] ?></td>
					</tr>
					
				</table>
		
		<style type="text/css">th, td {
		  padding: 2px;
		}</style>
								
	</body>
</html>
<?php 
	endforeach; 
?>