<?php
	foreach ($ts1 as $dta): 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo __RUC__.'-'.$dta[gu_serie] ?>-<?php echo str_pad($dta[gu_correlativo], 8, "0", STR_PAD_LEFT); ?>
			
	</head>
	<body style=";font-family: 'Helvetica'"><style type="text/css">
				<style>
			       @page { margin: 170px	0px 50px; }
			       #header { position: fixed; top: 170px; left: 0px; right: 0px; height: 150px;}
			       #footer { position: fixed; left: 0px; bottom: -90px; right: 0px; height: 150px;}
			       #footer .page:after { content: counter(page, upper-roman); }
			     </style>
			</style>
		<?php 
			$tip_comp='GUÍA DE REMISIÓN REMITENTE';
			if ($dta[gu_tipo]=='09') {
				?>
					<div style="padding: 25px;">
						<table style="width: 100%;" id="header">
							<tr>
								<td style="width: 200px">
									<img src="../../recursos/img/<?php echo $dta[idgiros] ?>.png" alt="SmartAdmin" style="margin-top: -15px; width: 160px;">
								</td>
								<td style="width: 100%; ">
									<center>
										<?php echo __RAZON__ ?>
										<br>
										R.U.C.: <?php echo __RUC__ ?>
										<br>
										<?php echo __DIREC__ ?>
										<br>
										<?php echo __UBICA__ ?>
									</center>
								</td>
								<td>
									<table style="width: 250px; border: 1px solid">
										<tr>
											<td>
												<center>
													R.U.C. <br>
													<?php echo __RUC__; ?><br>
													<?php echo $tip_comp ?> ELECTRÓNICA
													<br>
													<?php echo $dta[gu_serie] ?>-<?php echo str_pad($dta[gu_correlativo], 8, "0", STR_PAD_LEFT);  ?>
												</center>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table> <br><br> 
						<table style="width: 100%;font-size: 10px">
							<tr>
								<td style="width: 5px">CLIENTE</td>
								<td style="width: 5px">:</td>
								<td><?php echo $dta[co_nombre_envia] ?></td>
								<td style="width: 50px"></td>
								<td style="width: 5px">Fecha</td>
								<td style="width: 5px">:</td>
								<td><?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
							</tr>
							<tr>
								<td style="width: 5px">RUC</td>
								<td style="width: 5px">:</td>
								<td><?php echo $dta[co_ruc_envia] ?></td>
								<td style="width: 50px"></td>
								<td style="width: 5px"></td>
								<td style="width: 5px"></td>
								<td></td>
							</tr>
						</table>
						<br>
						<table style="width: 100%; border-collapse:collapse;font-size: 10px">
							<tr>
								<td style="border:1px solid black;border-collapse:collapse;"><b>PUNTO DE PARTIDA</b></td>
								<td style="width: 20px"></td>
								<td style="border:1px solid black;border-collapse:collapse;"><b>PUNTO DE LLEGADA</b></td>
							</tr>
							<tr>
								<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
									<table style="width: 100%;  font-size: 10px">
										<tr>
											<td>UBIGEO</td>
											<td style="width: 5px">:</td>
											<td><?php echo $dta[part] ?></td>
										</tr>
										<tr>
											<td style="vertical-align: top">DIRECCIÓN</td>
											<td style="width: 5px">:</td>
											<td>
												<?php 
													$class = new Mod(); 
				    								$ts2= $class->sel5($dta[parte]);
													echo mb_strtoupper($dta[d_part].', <br>'.$ts2[0][ub]);
												?>
											</td>
										</tr>
									</table>
								</td>
								<td style="width: 20px"></td>
								<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
									<table style="width: 100%; font-size: 10px">
										<tr>
											<td>UBIGEO</td>
											<td style="width: 5px">:</td>
											<td><?php echo $dta[dest] ?></td>
										</tr>
										<tr>
											<td style="vertical-align: top">DIRECCIÓN</td>
											<td style="width: 5px">:</td>
											<td>
												<?php 
													$class = new Mod(); 
				    								$ts3= $class->sel5($dta[llega]);
													echo mb_strtoupper($dta[d_dest].'<br>'.$ts3[0][ub]);
												?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<br>
						<table style="width: 100%; border:1px solid black;border-collapse:collapse; text-align: center; font-size: 10px">
							<tr>
								<td style="border:1px solid">CONDICION DE VENTA</td>
								<td style="border:1px solid">FACTURA</td>
								<td style="border:1px solid">CODIGO DE VENDEDOR</td>
								<td style="border:1px solid">CODIGO</td>
								<td style="border:1px solid">MOTIVO DE TRASLADO</td>
								<td style="border:1px solid">FECHA DE INICIO DE TRASLADO</td>
							</tr>
							<tr>
								<td style="border:1px solid">1</td>
								<td style="border:1px solid"><?php echo $dta[co_serie].'-'.str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT) ?></td>
								<td style="border:1px solid">V<?php echo str_pad($dta[iduser], 3, "0", STR_PAD_LEFT) ?></td>
								<td style="border:1px solid"><?php echo $dta[lo_codigo] ?></td>
								<td style="border:1px solid">
									<?php 
										switch ($dta[gu_guia_motivo]) {
											case '01':
												echo 'VENTA';
											break;
											case '02':
												echo 'COMPRA';
											break;
											case '04':
												echo 'TRASLADO ENTRE ESTABLECIMIENTOS DE LA MISMA EMPRESA';
											break;
											case '13':
												echo 'OTROS';
											break;
										}
									?>
								</td>
								<td style="border:1px solid"><?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
							</tr>
						</table>
						<br>
						<table style="width: 100%; border:1px solid black;border-collapse:collapse; text-align: center; font-size: 10px">
							<tr>
								<td style="border:1px solid">ITEM</td>
								<td style="border:1px solid">CÓDIGO</td>
								<td style="border:1px solid">DESCRIPCIÓN</td>
								<td style="border:1px solid">CANTIDAD</td>
								<td style="border:1px solid">UNID. MEDIDA</td>
							</tr>
							<?php 
								$c=1;
								foreach ($ts2 as $dta2): 
									?>
										<tr>
											<td>
												<?php echo $c; ?>
											</td>
											<td><?php echo $dta2[idproducto] ?></td>
											<td style="text-align: left;">
												<?php 
													if (!$dta2[idproducto]) {
														if ($dta2[de_tipo_encomienda]==1) {
															echo '(SOBRE) '.$dta2[de_descrip];
														}else{
															echo '(PAQUETE) '.$dta2[de_descrip];
														}
													}else{
														echo $dta2[pr_nombre];
													}
												?>
												
											</td>
											<td><?php echo $dta2[de_cant] ?></td>
											<td><?php echo $dta2[de_medida] ?></td>
										</tr>
									<?php
									$c++;
								endforeach; 
							?>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
							<tr>
								<td colspan="5"><br></td>
							</tr>
						</table>
						<br>
						<table style="width: 100%; border-collapse:collapse;font-size: 10px" id="footer">
							<tr>
								<td style="border:1px solid black;border-collapse:collapse;"><b>TRANSPORTE PRIVADO</b></td>
								<td style="width: 20px"></td>
								<td style="border:1px solid black;border-collapse:collapse;"><b>TRANSPORTE PUBLICO</b></td>
							</tr>
							<tr>
								<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
									<table style="width: 100%; font-size: 10px">
										<tr>
											<td>DNI</td>
											<td style="width: 5px">:</td>
											<td><?php echo __RUC__ ?></td>
										</tr>
										<tr>
											<td style="vertical-align: top">NOMBRES</td>
											<td style="width: 5px">:</td>
											<td><?php echo __RAZON__ ?></td>
										</tr>
										<tr>
											<td style="vertical-align: top">LICENCIA DE CONDUCIR</td>
											<td style="width: 5px">:</td>
											<td>-</td>
											
										</tr>
										<tr>
											<td style="vertical-align: top">NÚMERO DE PLACA</td>
											<td style="width: 5px">:</td>
											<td><?php echo $dta[ve_placa] ?></td>
											
										</tr>
									</table>
								</td>
								<td style="width: 20px"></td>
								<td style="width: 49%; border:1px solid black;border-collapse:collapse; vertical-align: top;">
									<table style="width: 100%; font-size: 10px">
										<tr>
											<td>DNI</td>
											<td style="width: 5px">:</td>
											<td></td>
										</tr>
										<tr>
											<td style="vertical-align: top">NOMBRES</td>
											<td style="width: 5px">:</td>
											<td></td>
										</tr>
										<tr>
											<td style="vertical-align: top">LICENCIA DE CONDUCIR</td>
											<td style="width: 5px">:</td>
											<td></td>
											
										</tr>
										<tr>
											<td style="vertical-align: top">NÚMERO DE PLACA</td>
											<td style="width: 5px">:</td>
											<td></td>
											
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<table>
										<tr>
											<td style="width: 5px; padding: 25px;">
												<?php 
													$subtt=$dta[co_total]/1.18;
													if (strlen($dta[co_ruc_envia])==8) {$nuu='01';}else{$nuu='06';}
													$cod=__RUC__.' | '.$dta[gu_tipo].' | '.$dta[gu_serie].' | '.$dta[gu_correlativo].' | '.number_format($dta[co_total]-$subtt,2).' | '.number_format($dta[co_total],2).' | '.$dta[co_fecha].' | '.$nuu.' | '.$dta[co_ruc_envia].' | ';
													QRcode::png($cod,"../../recursos/qr/temp/".$serie.".png",QR_ECLEVEL_L,3,1);
													echo '<img style="width:100px" src="../../recursos/qr/temp/'.$serie.'.png"/>';
												?>
											</td>
											<td style=" padding: 25px; font-size: 10px">
												<center>Representación impresa de la GUÍA DE REMISION ELECTRÓNICA
													Puede ser consultado desde su clave sol o ingresando a la pagina web: https://www.cpe.faskex.com</center>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						
					</div>
				<?php 
			}else{
				?>
				<table style="font-size: 10px; width: 100%;font-family: Arial; margin-left: 50px" id="header">
					<tr>
						<td></td>
						<td colspan="3"><?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
						<td></td>
						<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
					</tr>
					<tr>
						<td style="width: 50px"></td>
						<td colspan="3">
							<?php 
								$class = new Mod(); 
				    			$ts3= $class->sel4($dta[part]);
								echo mb_strtoupper($ts3[0][ub]); 
							?>
						</td>
						<td></td>
						<td colspan="3">
							<?php 
								$class = new Mod(); 
				    			$ts4= $class->sel4($dta[dest]);
								echo mb_strtoupper($ts4[0][ub]); 
							?>
						</td>
					</tr>
					<tr>
						<td colspan="8" style="height: 3px"></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3">
							<?php echo $dta[co_nombre_envia] ?>
						</td>
						<td></td>
						<td colspan="3">
							<?php echo $ts2[0][de_nombre] ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $dta[co_ruc_envia] ?></td>
						<td></td>
						<td><?php echo $dta[co_tel_envia] ?></td>
						<td></td>
						<td><?php echo $ts2[0][de_ruc] ?></td>
						<td></td>
						<td><?php echo $dta[co_tel_recibe] ?></td>
					</tr>
				</table>
				<br><br><br>
				<table style="width: 100%; font-size: 10px; margin-top: 260px;font-family: Arial;">
					<tr>
						<td>1</td>
						<td style="width: 380px">
							<?php 
								if ($ts2[0][de_tipo_encomienda]==1) {
									echo '(SOBRE) '.$ts2[0][de_descrip];
								}else{
									echo '(PAQUETE) '.$ts2[0][de_descrip];
								}
							?>
						</td>
						<td style="text-align: center;">1</td>
						<td style="text-align: center;"><?php echo $ts2[0][de_medida] ?></td>
						<td style="text-align: center;"><?php echo number_format($ts2[0][de_peso],2) ?></td>
					</tr>
				</table>
				<table style="margin-top: 40px;margin-left: 10px; width: 100%;font-size: 10px; font-family: Arial;" id="footer">
					<tr>
						<td style="width: 440px">
							<table style="width: 700px">
								<tr>
									<td><?php echo __RAZON__ ?></td>
								</tr>
								<tr>
									<td><?php echo __RUC__ ?></td>
								</tr>
								<tr>
									<td><br><br>
										<table>
											<tr>
												<td></td>
												<td><br><?php echo $dta[co_ruc_envia] ?></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td style="vertical-align: top;">
							<?php 
								$class = new Mod(); 
				    			$ts4= $class->sel2($dta[idrutas]);
							?>
							<table style="width: 100%;">
								<tr>
									<td></td>
									<td><?php echo $ts4[0][ve_marca] ?></td>
									<td style="width: 100px"></td>
									<td><?php echo $ts4[0][ve_placa] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?php echo $dta[co_nombre] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td><?php echo $dta[co_nombre] ?></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td colspan="3"><?php echo $ts4[0][pe_licencia] ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<?php
			}
		?>
	</body>
</html>
<?php 
	endforeach; 
?>