<?php 
    foreach ($ts1 as $dta): 
    if ($dta[co_tipo]=='01') {$tip_comp='FACTURA';}elseif ($dta[co_tipo]=='03'){$tip_comp='BOLETA';}elseif ($dta[co_tipo]=='07'){$tip_comp='NOTA DE CRÉDITO';}elseif ($dta[co_tipo]=='08'){$tip_comp='NOTA DE DÉBITO';}
?>
<?php echo "." ?>
	<!DOCTYPE html>
		<html>
			<head>
				<title><?php echo __RUC__.'-'.$dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT); ?></title>
			</head>
			<body>
				<style>
			       @page { margin: 120px 50px; }
			       #header { position: fixed; left: 0px; top: -140px; right: 0px; height: 150px;  text-align: center; }
			       #footer { position: fixed; left: 0px; bottom: -100px; right: 0px; height: 150px;}
			       #footer .page:after { content: counter(page, upper-roman); }
			     </style>

				<table style="width: 100%;font-family: Arial; "  id="header" cellspacing="0.2" cellpadding="0.2">
					<tr>
						<td style="width: 5px; vertical-align: middle;">
							<img src="../../recursos/img/<?php echo $dta[idgiros] ?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 200px;">
						</td>
						<td style="text-align: center; vertical-align: middle;">
							<font>
								<?php echo __RAZON__ ?>
							</font>
							<br>
							<font style="font-size: 11px">
								R.U.C.: <?php echo __RUC__ ?><br> 
							</font>
							
							<font style="font-size: 9px">
								<?php echo utf8_encode('DIRECCIÓN:').utf8_encode(__DIREC__) ?><br><?php echo mb_strtoupper(utf8_encode(__UBICA__)) ?><br>
								
							</font>
							
							<font style="font-size: 9px">
								<?php 
									if ($emp[0][lo_mail]) {
										echo utf8_encode('CORREO: ').mb_strtoupper(utf8_encode($emp[0][lo_mail])).'<br>';
									}
									
								?>
							</font>
							
							<font style="font-size: 9px">
								<?php echo utf8_encode('TLF.: ').$emp[0][lo_telefonos] ?>
							</font>
						</td>
						<td style="width: 200px;">
							<table style="width: 200px; border: 1px solid; font-size: 12px">
								<tr>
									<td>
										<center>
											R.U.C. <br>
											<?php echo __RUC__; ?><br>
											<?php echo utf8_encode($tip_comp.' '.'ELECTRÓNICA') ?> <br>
											<?php echo $dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT);  ?>
										</center>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<table style="width: 100%; font-size: 10px">
					<tr>
						<td style="width: 100px">CLIENTE</td>
						<td>: <?php echo $dta[co_nombre_envia] ?></td>
						<td style="width: 60px">FECHA</td>
						<td style="width: 120px">: <?php echo date("d/m/Y - h:i a", strtotime($dta[co_fecha])) ?></td>
					</tr>
					<tr>
						<td style="width: 5px">R.U.C.</td>
						<td>: <?php echo $dta[co_ruc_envia] ?></td>
						<td>MONEDA</td>
						<td>: SOLES</td>
					</tr>
					<tr>
						<td style="width: 5px"><?php echo utf8_encode('DIRECCIÓN') ?></td>
						<td colspan="3">: <?php echo $dta[co_direcc_envia] ?></td>
					</tr>
					<?php 
						if ($dta[co_cargo]) {
							?>
								<table style="width: 100%; border-collapse:collapse;font-size: 10px">
									<tr>
										<td style="border:1px solid black;border-collapse:collapse;"><b>REMITENTE</b></td>
										<td style="width: 20px"></td>
										<td style="border:1px solid black;border-collapse:collapse;"><b>CONSIGNADO</b></td>
									</tr>
									<tr>
										<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
											<table style="width: 100%; ">
												<tr>
													<td>DOC.</td>
													<td>: <?php echo $dta[co_ruc_envia] ?></td>
												</tr>
												<tr>
													<td>NOM. REMITENTE</td>
													<td>: <?php echo $dta[co_nombre_envia] ?></td>
												</tr>
												<tr>
													<td><?php echo utf8_encode('ORIGEN') ?></td>
													<td>: 
														<?php 
															$class = new Mod(); 
							    							$ts2= $class->sel5($dta[part]);
							    							echo mb_strtoupper(utf8_encode($dta[d_part].', <br>'.$ts2[0][ub]));
														?>
													</td>
												</tr>
											</table>
										</td>
										<td style="width: 20px"></td>
										<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
											<table style="width: 100%;">
												<tr>
													<td>DOC.</td>
													<td>: <?php echo $dtprod[0][de_ruc] ?></td>
												</tr>
												<tr>
													<td style="vertical-align: top">NOM. CONSIGNADO</td>
													<td>: <?php echo $dtprod[0][de_nombre] ?></td>
												</tr>
												<tr>
													<td style="vertical-align: top">DESTINO</td>
													<td>: 
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
											</table>
										</td>
									</tr>
								</table>
							<?php
						}
						if ($dta[co_tipo]=='07') {
							?>
								<tr>
									<td style="width: 5px">DOC. AFECTADO</td>
									<td>: <?php echo $dta[co_docref] ?></td>
									<td>FECHA REF.</td>
									<td>: <?php echo date('d/m/Y', strtotime($dta[co_fech_ref])) ?></td>
								</tr>
								<tr>
									<td style="width: 5px">TIPO DE NOTA</td>
									<td colspan="3">: 
										<?php 
										switch ($dta[co_tipo_nota]) {
											case '01':
												echo utf8_encode('ANULACIÓN DE LA OPERACIÓN');
											break;
											case '02':
												echo utf8_encode('ANULACIÓN POR ERROR EN RUC');
											break;
											case '04':
												echo utf8_encode('DESCUENTO GLOBAL');
											break;
											case '06':
												echo utf8_encode('DEVOLUACIÓN TOTAL');
											break;
										}
										?>
									</td>
								</tr>
								<tr>
									<td style="width: 5px"><?php echo utf8_encode('DESCRIPCIÓN') ?></td>
									<td colspan="3">: <?php echo $dta[co_glosa] ?></td>
								</tr>
							<?php
						}
					?>
				</table>
				<style type="text/css">th, td {
  padding: 3px;
}</style>
				<table style="width: 100%;border-collapse:collapse; text-align: center; font-size: 10px;margin-top: 10px">
					<tr>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 40px">ITEM</td>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 40px">CANT</td>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 40px">UNIDAD</td>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 5px"><?php echo utf8_encode('CÓDIGO') ?></td>
						<td style="border-top:1px solid;border-bottom:1px solid;"><?php echo utf8_encode('DESCRIPCIÓN') ?></td>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 40px">P. UNIT</td>
						<td style="border-top:1px solid;border-bottom:1px solid;width: 5px">TOTAL</td>
					</tr>
					<?php 
						if ($dta[co_cargo]) {
							?>
								<tr>
									<td>1</td>
									<td>1</td>
									<td>NIU</td>
									<td>0</td>
									<td>
										<?php echo ($dtprod[0][de_tipo_encomienda]==1)?'(SOBRE) ':'(PAQUETE) '; ?>
										<?php echo $dtprod[0][de_descrip] ?>
									</td>
									<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
									<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
								</tr>
								<?php
						}else{
							$c=1;
							foreach ($dtprod as $dta2): $c++;
								?>
									<tr>
									<td><?php echo $c; ?></td>
									<td><?php echo $dta2[de_cant] ?></td>
									<td><?php echo $dta2[de_medida] ?></td>
									<td><?php echo $dta2[iddet] ?></td>
									<td style="text-align: left;"><?php echo mb_strtoupper(utf8_encode($dta2[descrip])) ?></td>
									<td style="text-align:right; "><?php echo number_format($dta2[de_unit],2) ?></td>
									<td style="text-align:right; "><?php echo number_format($dta2[de_total],2) ?></td>
								</tr>
								<?php
							endforeach; 
						}
					?>
					
				</table>
				<table style="width: 100%; font-size: 10px" id="footer">
					<tr>
						<td colspan="3" style="border-bottom:1px solid;"><br></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: left;">
							SON: <?php echo  strtoupper(utf8_encode(CifrasEnLetras::convertirEurosEnLetras(number_format($dta[co_total], 2, ',', '.'),2))); ?>/100 SOLES.
						</td>
					</tr>
					<tr>
						<td rowspan="7" style="vertical-align:top">
							<table style="width: 100%">
								<tr>
									<td style="width: 5px">
										<?php 
											$subtt=$dta[co_total]/1.18;
											if (strlen($dta[co_ruc_envia])==8) {$nuu='01';}else{$nuu='06';}
											$cod=__RUC__.' | '.$dta[co_tipo].' | '.$dta[co_serie].' | '.$dta[co_correlativo].' | '.number_format($dta[co_total]-$subtt,2).' | '.number_format($dta[co_total],2).' | '.$dta[co_fecha].' | '.$nuu.' | '.$dta[co_ruc_envia].' | ';
											QRcode::png($cod,"../../recursos/qr/temp/".$serie.".png",QR_ECLEVEL_L,3,1);
											echo '<img style="width:110px" src="../../recursos/qr/temp/'.$serie.'.png"/>';
										?>
									</td>
									<td style="text-align: center;">
										Representacion impresa de la electronica, puede ser consultado en https://www.cpe.faskex.com/.
									</td>
								</tr>
							</table>
							
						</td>
					</tr>
					<tr>
						<td>
							<table style="width: 200px;">
								<?php 
									if ($dta[co_tipo]=='03') {
										?>
											<tr>
												<td style="text-align: right; font-size:13px;font-weight: bold; "><b>TOTAL A PAGAR: S/</b></td>
												<td style="text-align: right;font-size:13px"><?php echo number_format($dta[co_total],2) ?></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
										<?php
									}elseif ($dta[co_tipo]=='01' || $dta[co_tipo]=='07') {
										?>
											<tr>
												<td  style="text-align: right; width: 130px; font-size:13px"><b>OP. GRAVADA: S/</b></td>
												<td style="text-align: right;font-size:13px"><?php echo number_format($subtt,2) ?></td>
											</tr>
											<tr>
												<td  style="text-align: right; font-size:13px"><b>OP. GRAVADA: S/</b></td>
												<td style="text-align: right;font-size:13px"><?php echo number_format($subtt,2) ?></td>
											</tr>
											<tr>
												<td style="text-align: right; font-size:13px"><b>I.G.V.: S/</b></td>
												<td style="text-align: right;font-size:13px"><?php echo number_format($dta[co_total]-$subtt,2) ?></td>
											</tr>
											<tr>
												<td style="text-align: right; font-size:13px;font-weight: bold; "><b>TOTAL A PAGAR: S/</b></td>
												<td style="text-align: right;font-size:13px"><?php echo number_format($dta[co_total],2) ?></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
											<tr>
												<td style="text-align: right;"></td>
												<td style="width: right"><br></td>
											</tr>
										<?php
									}
								 ?>
								
							</table>
						</td>
						</td>
					</tr>
				</table>
			</body>
		</html>
<?php 
	endforeach; 
?>