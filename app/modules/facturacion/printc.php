<?php 
	include_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
	include_once('letras.php');
	include_once "../../recursos/qr/phpqrcode/qrlib.php";
	$class = new Mod(); 
    $ts1= $class->printComp($_GET['id']);
    foreach ($ts1 as $dta): 
    if ($dta[co_tipo]=='01') {$tip_comp='FACTURA';}elseif ($dta[co_tipo]=='03'){$tip_comp='BOLETA';}elseif ($dta[co_tipo]=='07'){$tip_comp='NOTA DE CRÉDITO';}elseif ($dta[co_tipo]=='08'){$tip_comp='NOTA DE DÉBITO';}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo __RUC__.'-'.$dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT); ?></title>
</head>
<body onload="window.print();" onafterprint="window.close();">
	<table style="width: 100%;font-family: Arial; " cellspacing="0.7" cellpadding="0.7">
				<tr>
					<td style="text-align: center; font-size: 12px" colspan="3">
						<img src="../../recursos/img/<?php echo $dta[idgiros] ?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;">
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 12px" colspan="3">
						<?php echo __RAZON__ ?><br>R.U.C.: <?php echo __RUC__ ?><br>DIRECCIÓN: <?php echo __DIREC__ ?>
					</td>
				</tr>
				<tr>
					<td style="text-align: center; font-size: 20px" colspan="3">
						<?php echo $tip_comp; ?> ELECTRÓNICA
					</td>
				</tr>
				<tr style="text-align: center;">
					<td colspan="3">
						<b><?php echo $dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT);  ?></b>
					</td>
				</tr>
				<tr style="font-size: 10px" >
					<td>
						FECHA EMISIÓN
					</td>
					<td style="width: 2px">:</td>
					<td><?php echo date("d/m/Y - h:i a", strtotime($dta[co_fecha])) ?></td>
				</tr>
				<tr style="font-size: 10px" >
					<td>
						CAJERO
					</td>
					<td style="width: 2px">:</td>
					<td><?php echo explode(' ', $dta[nom])[0].' '.explode(' ', $dta[apell])[0] ?></td>
				</tr>
				<tr style="font-size: 10px" >
					<td>
						R.U.C.
					</td>
					<td style="width: 2px">:</td>
					<td><?php echo $dta[co_ruc_envia] ?></td>
				</tr>
				<tr style="font-size: 10px" >
					<td>
						CLIENTE
					</td>
					<td style="width: 2px">:</td>
					<td><?php echo $dta[co_nombre_envia] ?></td>
				</tr>
				<tr style="font-size: 10px" >
					<td>
						DIRECCIÓN
					</td>
					<td style="width: 2px">:</td>
					<td><?php echo $dta[co_direcc_envia] ?></td>
				</tr>
				
				<?php 
					$class = new Mod(); 
    				$dtprod= $class->detprod($_GET['id']);
					if ($dta[co_tipo]!='07' && $dta[co_tipo]!='08') {
						if ($dta[co_cargo]) {
							
							?>	
								<tr>
									<td style="border-top: 1px;border-top-style: dashed;  " colspan="3"></td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										DOC. REMITENTE
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dta[co_ruc_envia] ?></td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										NOM. REMITENTE
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dta[co_nombre_envia] ?></td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										TEL. REMITENTE
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dta[co_tel_envia] ?></td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										DOC. CONSIGNADO
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dtprod[0][de_ruc] ?></td>
								</tr>
								<tr style="font-size: 10px;white-space:nowrap;" >
									<td>
										NOM. CONSIGNADO
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dtprod[0][de_nombre] ?></td>
								</tr>
								<tr style="font-size: 10px;white-space:nowrap;" >
									<td>
										TEL. CONSIGNADO
									</td>
									<td style="width: 2px">:</td>
									<td>-</td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										DIR. CONSIGNADO
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo $dtprod[0][de_direccion] ?></td>
								</tr>
								<tr>
									<td style="border-top: 1px;border-top-style: dashed;  " colspan="3"></td>
								</tr>
								<tr style="font-size: 10px" >
									<td colspan="3">
										GUIA CLIENTE:
									</td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										COND. PAGO
									</td>
									<td style="width: 2px">:</td>
									<td>
										<?php
											switch ($dta[co_tipo_pago]) {
											 	case '1':
											 		echo 'EFECTIVO';
											 		break;
											 	case '2':
											 		echo 'TRANSFERENCIA';
											 		break;
											 	case '3':
											 		echo 'IZIPAY';
											 		break;
											 	case '4':
											 		echo 'DESTINO';
											 		break;
											 } 
										?>
									</td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										PESO
									</td>
									<td style="width: 2px">:</td>
									<td><?php echo number_format($dta[co_peso],2) ?> <?php echo ($dta[co_medida]==1)?'Kg.':'Gr.';?></td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										ORIGEN
									</td>
									<td style="width: 2px">:</td>
									<td>
										<?php 
											$class = new Mod(); 
	    									$ts2= $class->sel5($dta[part]);
	    									
											echo mb_strtoupper($dta[d_part].', <br>'.$ts2[0][ub]);
										?>
									</td>
								</tr>
								<tr style="font-size: 10px" >
									<td>
										DESTINO
									</td>
									<td style="width: 2px">:</td>
									<td>
										<?php 
											$class = new Mod(); 
	    									$ts3= $class->sel5($dtprod[0][idlocales]);
											if ($dtprod[0][de_tipo_entrega]==1) {
												echo '(DOMICILIO) - '.mb_strtoupper($dtprod[0][de_direccion].', '.utf8_encode($ts3[0][ub]));
											}else{
												echo '(OFICINA) '.mb_strtoupper(utf8_encode($dta[nomd]).', '.utf8_encode($ts3[0][ub]));
											}
										?>
									</td>
								</tr>
							<?php
						}
						
					}else{
						?>
							<tr>
								<td style="border-top: 1px;border-top-style: dashed;  " colspan="3"></td>
							</tr>
							<tr style="font-size: 10px" >
								<td>
									DOC. REF.
								</td>
								<td style="width: 2px">:</td>
								<td><?php echo $dta[co_docref] ?></td>
							</tr>
							<tr style="font-size: 10px" >
								<td>
									FECH. DOC. REF.
								</td>
								<td style="width: 2px">:</td>
								<td><?php echo date('d/m/Y', strtotime($dta[co_fech_ref])) ?></td>
							</tr>
							<tr style="font-size: 10px" >
								<td>
									MOTIVO
								</td>
								<td style="width: 2px">:</td>
								<td>
									<?php 
										switch ($dta[co_tipo_nota]) {
											case '01':
												echo 'Anulación de la operación';
											break;
											case '02':
												echo 'Anulación por error en el RUC';
											break;
											case '04':
												echo 'Descuento global';
											break;
											case '06':
												echo 'Devolución total';
											break;
										}
									?>
								</td>
							</tr>
							<tr style="font-size: 10px" >
								<td>
									GLOSA
								</td>
								<td style="width: 2px">:</td>
								<td><?php echo $dta[co_glosa] ?></td>
							</tr>
						<?php
					}
				?>
				
				<tr>
					<td colspan="3">
						<table style="width: 100%;font-size: 10px ">
							<tr>
								<td style="border-top: 1px;border-top-style: dashed;  " colspan="4"></td>
							</tr>
							<tr style="text-align: center;">
								<td >CANT.</td>
								<td >DESCRIPCIÓN</td>
								<td >P. UNIT</td>
								<td >TOTAL</td>
							</tr>
							<tr>
								<td style="border-top: 1px;border-top-style: dashed;  " colspan="4"></td>
							</tr>
							<?php 
								if ($dta[co_cargo]) {
									?>
										<tr>
											<td>1</td>
											<td>
												<?php echo ($dtprod[0][de_tipo_encomienda]==1)?'(SOBRE) ':'(PAQUETE) '; ?>
												<?php echo $dtprod[0][de_descrip] ?>
											</td>
											<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
											<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
										</tr>
									<?php
								}else{
									foreach ($dtprod as $dta2):
										?>
											<tr>
												<td><?php echo $dta2[de_cant] ?></td>
												<td><?php echo $dta2[pr_nombre] ?></td>
												<td style="text-align:right; "><?php echo number_format($dta2[de_unit],2) ?></td>
												<td style="text-align:right; "><?php echo number_format($dta2[de_total],2) ?></td>
											</tr>
										<?php
									endforeach; 
									
								}
							 ?>
							
							<tr>
								<td style="border-top: 1px;border-top-style: dashed;  " colspan="4"></td>
							</tr>
							<tr>
								<td colspan="2" style="width:110px; text-align: center;padding: 10px">
									<?php 
										$subtt=$dta[co_total]/1.18;
										if (strlen($dta[co_ruc_envia])==8) {$nuu='01';}else{$nuu='06';}
										$cod=__RUC__.' | '.$dta[co_tipo].' | '.$dta[co_serie].' | '.$dta[co_correlativo].' | '.number_format($dta[co_total]-$subtt,2).' | '.number_format($dta[co_total],2).' | '.$dta[co_fecha].' | '.$nuu.' | '.$dta[co_ruc_envia].' | ';
										QRcode::png($cod,"../../recursos/qr/temp/".$serie.".png",QR_ECLEVEL_L,3,1);
										echo '<img style="width:110px" src="../../recursos/qr/temp/'.$serie.'.png"/>';
									?>

								</td>
								<td colspan="2" style="width: 100%; vertical-align: top;padding: 10px 0px 0px">
									<table style="width: 100%">
										<tr>
											<td colspan="3" style="text-align: right;">SUB TOTAL: S/</td>
											<td style="text-align: right;"><?php echo number_format($subtt,2) ?></td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: right;">GRAVADA: S/</td>
											<td style="text-align: right;"><?php echo number_format($subtt,2) ?></td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: right;white-space:nowrap;">I.G.V.(18%): S/</td>
											<td style="text-align: right;"><?php echo number_format($dta[co_total]-$subtt,2) ?></td>
										</tr>
										<tr>
											<td colspan="3" style="text-align: right;">TOTAL: S/</td>
											<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
										</tr>
										<tr>
											<td colspan="2">
												
											</td>
										</tr>
									</table>
									SON: <?php echo  strtoupper(CifrasEnLetras::convertirEurosEnLetras(number_format($dta[co_total], 2, ',', '.'),2)); ?>/100 Soles.
								</td>
							</tr>
							<?php 
								if ($dta[co_tipo]!='07' && $dta[co_tipo]!='08') {
									?>
										<tr>
											<td colspan="4"><center>
												REPRESENTACIÓN IMPRESA DE LA FACTURA ELECTRÓNICA  <br>Usted puede consultar su CPE, desde su clave sol o ingresando a la pagina web. <br>
												<br>
												<?php 
													if ($dta[co_cargo]) {
														?>
															RECOJA SU ENCOMIENDA ANTES DE 7 DIAS <br>
															CONDICIONES DEL SERVICIO</center>
															1- La empresa no se responsabiliza ante robo o sustraccion de la encomienda (DS-017-2009-MTC)
															<br>
															2- La indemnizacion por perdida de encomienda se abonara (10 veces) del valor del flete pagado.
															<br>
															3- La empresa no se responsabiliza por deterioros debido al mal embalaje ni por descoposicion de articulos perecibles
															<br>
															4- La empresa no se responsabiliza por articulos no declarados y valorizados con facturas <br>
															5- Esta prohibido enviar o remitir productos inflamables (gasolina, quimicos o explosivos, etc)<br>
															6-Toda declaracion del contenido de la encomienda es responsabilidad del usuario conforme a ley Nº 27444
															<br><br><br>
															<center>__________________ <br>Recibi Conforme</center>
															<br>
														<?php
													}
												?>
												
												<center>**Gracias por su visita**</center><br><br>
											</td>
										</tr>
									<?php
								}else{
									?>
										<tr>
											<td colspan="4"><center>
												REPRESENTACION IMPRESA DE LA <?php echo $tip_comp ?> ELECTRONICA  <br>Usted puede consultar su CPE, desde su clave sol o ingresando a la pagina web: https://www.cpe.faskex.com <br>
												
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</td>
				</tr>
			</table>
		
</body>
</html>
<?php 
		endforeach; 
	?>