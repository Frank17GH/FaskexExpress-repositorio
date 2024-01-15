 <?php 
	require_once  "../../../recursos/db.class.php";
	include_once( "../.Model.php" );
	require_once('../components/letras.php');
	include_once "../../../recursos/qr/phpqrcode/qrlib.php";

    $funcion = new Mod(); 
    $tsArray= $funcion->printCpe($_GET['id']);
    $funcion = new Mod(); 
    $tsArray2= $funcion->printCpeDet($_GET['id']);

	date_default_timezone_set('America/Lima');
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>IMPRESIÓN | <?php echo __RAZON__ ?></title>
</head>
<style type="text/css">
	body{
	  	font-family: Arial Narrow;
	} 
	.line{
		position: relative;border-style: dashed;
	    background-color: #fff;border-width: 1px;
	}
</style>
<body onload="window.print();setTimeout(function(){window.close();}, 1);" style="width: 100%;">
	<?php 
	  	foreach ($tsArray as $data): 
	  		$total=number_format($data['total'], 2);
	  		$base= $data['total']/1.18;
			$igv = $base*0.18;
	  		if($data['cTipoDocumentoEmisor']=='3'){
	  			$tipo= 'Boleta';
	  		}elseif($data['cTipoDocumentoEmisor']=='1'){
	  			$tipo= 'Factura';
	  		}elseif($data['cTipoDocumentoEmisor']=='7'){
	  			$tipo= 'Nota de crédito';
	  		} else {
	  			$tipo='VALE';
	  		}
	  		?>
				<table style="margin-top: -20px;margin-left: -10px; width:100%; font-size: 10px;">
					<tr>
						<td colspan="4" style="text-align: center;">
							<img style="width: 220px;" src="../components/logo.jpg">
							<br><b style="font-size: 12px;">R.U.C.:20570888936
						</td>
					</tr> 
					<tr>
						<td colspan="4">
							<b>
								<center>
									<label style="font-size: 16px; transform:scaleY(30);">
										CAJAMARCA: <br>
										Av. Atahualpa N° 347 <br>
										Cel.: 961 560 203
									</label>
									<br>
									<label style="font-size: 10px;">CAJAMARCA - CAJAMARCA - CAJAMARCA</label>
								</center>
							</b>
							<br>
							<center>
								Jr. Alexander Von Humbolt N° 527<br>
								Lima - Lima- La Victoria<br>
								<b>
									cargovillajaz@gmail.com<br>
								</b>
							</center>
							
						</td>
					</tr>
						<tr>
							<td colspan="4" style="font-size: 14px;">
								<div class="line"></div>
								<b>
									<center>
										<?php 
											if($data['cTipoDocumentoEmisor']=='03'){
												echo 'BOLETA DE VENTA ';
											}elseif($data['cTipoDocumentoEmisor']=='01'){
												echo 'FACTURA ';
											}elseif($data['cTipoDocumentoEmisor']=='02'){
												echo 'COMANDA INFORMATIVA';
											}elseif($data['cTipoDocumentoEmisor']=='07'){
												echo 'NOTA DE CRÉDITO ';
											}elseif($data['cTipoDocumentoEmisor']=='12'){
												echo 'TICKET DE VENTA';
											} 
										?>  ELECTRÓNICA
									</center>
								</b>
								<div class="line"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2"><b>SERIE:&nbsp;</b><?php echo $data['ser'] ?></td>
							<td colspan="2"><b>CORRELATIVO:&nbsp;</b><?php echo $data['num'] ?></td>
						</tr>
						<tr>
							<td colspan="2"><b>MONEDA:&nbsp;</b>SOL</td>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="4"> <center></center></td>
						</tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<b>Fecha de Emisión:</b> 
								<?php echo date("d/m/Y - h:m a", strtotime($data['cFechaEmision'])); ?>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<b>
									<?php 
										if (strlen ( $data['vcRucAdquiriente'] )==8) {
											echo 'SEÑOR(A)'; 
										}else{
											echo 'EMPRESA';
										}
									?>
								</b> 
								<?php echo strtoupper($data['vcRazonSocialAdquiriente']); ?>
							</td>
						</tr>
						<?php 
							if ($data['vcRucAdquiriente']) {
								?>
								<tr>
									<td colspan="4">
										<b>
											<?php 
												if (strlen($data['vcRucAdquiriente'])==8): 
													?>D.N.I. <?php 
												elseif (strlen($data['vcRucAdquiriente'])==11): 
													?>R.U.C. <?php 
												else: 
													?> DOC <?php 
												endif 
											?>
										</b> : <?php echo $data['vcRucAdquiriente']; ?></td>
								</tr>
								<?php
							}
							if ($data['dir']!="" && $data['dir']!="-"){
								?>
								<tr>
									<td colspan="4"><b>Dirección:</b> <?php echo $data['dir']; ?></td>
								</tr>
								<?php 
							} 
							if ($data['cTipoDocumentoEmisor']=='07'){
								?>
									<tr>
										<td colspan="4">
											<table style="width: 100%">
												<tr>
													<td colspan="2" style="text-align: left;"><b>Doc. Ref.:</b> <?php echo $data['DocRef']; ?></td>
													<td> </td>
													<td style="text-align: right;"><b>Fecha Doc. Ref.: </b><?php echo date("d/m/Y", strtotime($data['ifech']))?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td colspan="4"><b>Motivo o sustento:</b> <?php echo $data['Mot']; ?></td>
									</tr>
									<tr>
										<td colspan="4"><b><center>ANULACION DE LA OPERACION</center></b></td>
									</tr>
								<?php 
							} 
						?>
						<tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<tr>
							<td style="width:10px"><b><center>CANT</center></b></td>
							<td><b><center>DESCRIPCIÓN</center></b></td>
							<td style="width:10px"><b><center>UNIT</center></b></td>
							<td style="width:10px"><b><center>IMPORTE</center></b></td>
						</tr>
						<tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<?php 
							$cc=1;  
							foreach ($tsArray2 as $data2): 
								?>
									<tr>
										<td colspan="1">
											<center><?php echo number_format($data2['Cant'], 0) ?></center>
										</td>
										<td colspan="1">
											<?php echo $data2['Descrip'] ?>
										</td>
										<td colspan="1" style="text-align: right;">
											<?php echo number_format($data2['Unit'], 2) ?>
										</td>
										<td colspan="1" style="text-align: right; text-align: right;">
											<?php echo number_format($data2['Total'], 2, '.', '') ?>
										</td>
									</tr>
								<?php 
								$cc++; 
							endforeach; 
						?>
						<tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<?php 
							if($data['cTipoDocumentoEmisor']!='02'){
								?>
									<tr>
										<td colspan="2"><b>OP. GRAVADAS:</b></td>
										<td colspan="2" style="text-align: right; ">
											S/ <?php echo number_format($total - $igv, 2, '.', '') ?>
										</td>
									</tr>
								<?php
							}
							if($data['cTipoDocumentoEmisor']=='01'){
								?>
									<tr>
										<td colspan="2"><b>I.G.V:</b></td>
										<td colspan="2" style="text-align: right; ">
											S/ <?php echo number_format($igv, 2, '.', '') ?>
										</td>
									</tr>
								<?php
							}
						?>
						
						<tr>
							<td colspan="2"> <font ><b>IMPORTE TOTAL : </b></font> <font style="text-align: right; font-size: 20px;"></font></td>
							<td colspan="2" style="text-align: right; ">S/ <?php echo $total ?></td>
						</tr>
						<tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<tr>
							<td colspan="4">
								<b>SON: </b>
								<?php echo  ucfirst(CifrasEnLetras::convertirEurosEnLetras($data['total'])); ?>/100 Soles.
							</td>
						</tr>
						<tr>
							<td colspan="4"><div class="line"></div></td>
						</tr>
						<tr>
							<?php 
								if ($data['observaciones']) {
									?>
										<td colspan="4">
											<b>OBSERVACIONES:</b> <?php echo $data['observaciones'] ?>
										</td>
										<td colspan="4"><br></td>
									<?php 
								}
							?>
						</tr>
						
						<tr>
							
							
							<td colspan="4"><center style="font-size: 14px"><i>PAGO  - <?php if($data['pago']==1){echo 'CONTADO';} ?></i></center></td>
						</tr>
						<tr>
							<td colspan="4">
								<center>
									<?php echo 'Fecha de Impresión: '.date("d/m/Y - h:i a"); ?>		
								</center>
							</td>
						</tr>
						<?php 
							if($data['cTipoDocumentoEmisor']!='02'){
								?>
									<tr>
										<td colspan="4" style="text-align: center;">
											<?php 
										 		$cod=__RAZON__.' | '.$data['cTipoDocumentoEmisor'].' | '.$data['ser'].' | '.$data['num'].' | '.$total.' | '.$total.' | '.$data['cFecha'].' | '.$data['tipdoca'].' | '.$data['ruc'].' | ';
												QRcode::png($cod,"../../../recursos/qr/temp/".$data['ser'].'-'.$data['num'].".png",QR_ECLEVEL_L,3,1);
												echo '<img style="width:100px" src="../../../recursos/qr/temp/'.$data['ser'].'-'.$data['num'].'.png"/>';
											?>
											<br>
											Representación impresa de la <?php echo $tipo; ?> Electrónica, para consultar el documento visita: <b>https://cpe2.bi-fact.com</b><br>
										</td>
									</tr>
								<?php
							}
						?>
						
					</table>
					<?php 
				endforeach; 
			?>
		</body>
</html>

