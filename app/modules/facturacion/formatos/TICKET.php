<?php 

    foreach ($ts1 as $dta): 
    if ($dta[co_tipo]=='01') {$tip_comp='FACTURA';}elseif ($dta[co_tipo]=='03'){$tip_comp='BOLETA';}elseif ($dta[co_tipo]=='07'){$tip_comp='NOTA DE CRÉDITO';}elseif ($dta[co_tipo]=='08'){$tip_comp='NOTA DE DÉBITO';}
?>
<style type="text/css">
	@page {
            margin: 0px 5px 5px 5px !important;
            padding: 0px 0px 0px 0px !important;
        }
</style>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo __RUC__.'-'.$dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT); ?></title>
</head>
<body >
	<table style="width: 100%;font-family: sans-serif; " cellspacing="0.7" cellpadding="0.7" >
		<tr>
			<td style="text-align: center; font-size: 12px">
				<img src="../../recursos/img/<?php echo $dta[idgiros] ?>.png" alt="SmartAdmin" style="width: 180px;">
			</td>
		</tr>
		<tr>
			<td style="text-align: center; ">
				<font style="font-size: 10px">
					<?php echo __RAZON__ ?><br>
				</font>
				
				<font style="font-size: 9px">
					<?php echo utf8_encode(__DIREC__)?><br><?php echo utf8_encode(__UBICA__) ?><br>
				</font>
				<font style="font-size: 9px">
					R.U.C.: <?php echo __RUC__ ?><br>
				</font>

				<font style="font-size: 9px">
					<?php 
						if ($emp[0][lo_mail]) {
							echo utf8_encode($emp[0][lo_mail]);
						}
					?><br>
				</font>

				<font style="font-size: 9px">
					<?php 
						if ($emp[0][lo_telefonos]) {
							echo utf8_encode('Central Telefónica : '.$emp[0][lo_telefonos]);
						}
					?>
				</font>
			</td>
		</tr>

		<tr>
			<td style="color: #000000; text-align: center; font-size: 10px"><hr>
				<?php echo $tip_comp.utf8_encode(' ELECTRÓNICA'); ?>
			</td>
		</tr>

	<tr style="color: #000000;text-align: center; font-weight: bold; font-size: 12px">
		<td colspan="3">	
			<b><?php echo $dta[co_serie] ?>-<?php echo str_pad($dta[co_correlativo], 8, "0", STR_PAD_LEFT);  ?></b>
			<hr> 
		</td>
	</tr>

	</table>

	<table style="font-weight: normal;width: 100%;font-family: sans-serif ; " cellspacing="0.6" cellpadding="0.7">	
		<?php 
			if (!$dta[co_cargo]) {
				?>
					<tr style="font-size: 8.5px" >
						<td><?php echo utf8_encode('FECHA EMISIÓN'); ?></td>
						<td>: <?php echo date("d/m/Y - h:i a", strtotime($dta[co_fecha])) ?></td>
					</tr>
					<tr style="font-size: 9px" >
						<td>CAJERO</td>
						<td>: <?php echo mb_strtoupper(explode(' ', $dta[nom])[0].' '.explode(' ', $dta[apell])[0] )?></td>
					</tr>
				<?php
			}
		 ?>						
		
		<tr style="font-size: 9px" >
			<td>CLIENTE</td>
			<td>: <?php echo $dta[co_nombre_envia] ?></td>
		</tr>
		<tr style="font-size: 9px" >
			<td><?php echo (strlen($dta[co_ruc_envia])=='11')?'R.U.C.':'D.N.I.'; ?></td>
			<td>: <?php echo $dta[co_ruc_envia] ?></td>
		</tr>


		<tr style="font-size: 9px" >
			<td><?php echo utf8_encode('DIRECCIÓN ') ?></td>
			<td><?php echo $dta[co_direcc_envia] ?></td>
		</tr>	


		<?php 
			if ($dta[idgiros]==96) {
				?>
					<tr style="font-size: 10px" >
						<td><?php echo utf8_encode('TELÉFONO: ') ?></td>
						<td>: <?php echo $dta[co_tel_envia] ?></td>
					</tr>
				<?php
			}
		 ?>

		<?php 
			if ($dta[co_tipo]!='07' && $dta[co_tipo]!='08') {
				if ($dta[co_cargo]) {
					?>	
						<tr>
							<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
						</tr>
						<tr style="font-size: 9px" >
							<td>ORIGEN</td>
							<td>
								<?php 
									$class = new Mod(); 
	    							$ts2= $class->sel5($dta[part]);
	    							echo': '.  utf8_encode(explode("-",$ts2[0][ub])[2]);
								?>
								<br>
							</td>
						</tr>
						<tr style="font-size: 9px;color: #000000;" >
							<td>DESTINO</td>
							<td>
							 	<font style="font-size: 10 px">
							 		<?php $class = new Mod(); 
	    							$ts7= $class->sel4($dtprod[0][idlocales]);
									 echo ': '.utf8_encode($ts7[0][ub]);
									?>
								</font>
							 </td>	
						</tr>	

						<tr style="font-size: 9px;color: #000000;" >
							<td>TIPO ENTREGA</td>	
							<td>
								<?php 
									$class = new Mod(); 
	    							$ts3= $class->sel4($dtprod[0][idlocales]);
									if ($dtprod[0][de_tipo_entrega]==1) { 

										echo ': DOMICILIO';

									}else{
										echo ': OFICINA ';
									}
								?> 
							</td>				
						</tr>

						<tr style="font-size: 9px" >
							<td>DIRECCION</td>
							<td>
								<?php 
									$class = new Mod(); 
	    							$ts3= $class->sel4($dtprod[0][idlocales]);
									if ($dtprod[0][de_tipo_entrega]==1) { 

										echo ': '.mb_strtoupper($dtprod[0][de_direccion]); 

									}else{
										echo ': '.mb_strtoupper(utf8_encode($dta[nomd]));
									}
								?> 
							</td>
						</tr>
						<tr style="font-size: 9px" >
							<td>TIPO </td>
							<td>
							<?php echo ($dtprod[0][de_tipo_encomienda]==1)?': SOBRE ':': PAQUETE'; ?>
							
							</td>												
						</tr>
						<tr style="font-size: 9px" >
							<td>PESO</td>
							<td>: <?php echo number_format($dta[de_peso],2).' '.$dta[de_medida] ?></td>
						</tr>

						<tr>
							<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
						</tr>						
						<tr style="font-size: 9px" >
							<td style=" font-weight: bold;">REMITENTE</td>
							<td>: <?php echo $dta[co_nombre_envia] ?></td>
						</tr>
						<tr style="font-size: 10px; display: none;" >
							<td>DOC. REMITENTE</td>
							<td>: <?php echo $dta[co_ruc_envia] ?></td>
						</tr>
						<tr style="font-size: 10px; display: none;" >
							<td>TEL. REMITENTE</td>
							<td>: <?php echo $dta[co_tel_envia] ?></td>
						</tr>
						<tr style="font-size: 9px;white-space:nowrap;" >
							<td style=" font-weight: bold;">CONSIGNADO</td>
							<td>: <?php echo $dtprod[0][de_nombre] ?></td>
						</tr>
						<tr style="font-size: 10px; " >
							<td>DOC</td>
							<td>: <?php echo $dtprod[0][de_ruc] ?></td>
						</tr>
						
						<tr style="font-size: 10px;display:none;white-space:nowrap;" >
							<td>TELEFONO</td>
							<td>: - </td>
						</tr>
						<tr style="font-size: 9px;display:none" >
							<td>DIRECCION</td>
							<td>: <?php echo $dtprod[0][de_direccion] ?></td>
						</tr>

						<tr>
							<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
						</tr>

						<tr style="font-size: 8px;color: #000000;">
							<td> FORMA DE PAGO</td>
							<td> : AL CONTADO</td>
						</tr>
						
						<tr style="font-size: 9px;color: #000000;">
							<td> MEDIO DE PAGO</td>
							<td >
								<?php
									switch ($dta[co_tipo_pago]) {
										case '1':
											 echo ': EFECTIVO';
										break;
										case '2':
											echo ': TRANSFERENCIA';
										break;
										case '3':
											echo ': IZIPAY';
										break;
										case '4':
											echo ': DESTINO';
										break;
										case '5':
											echo ': DESTINO';
										break;
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
						<td>DOC. REF.</td>
						<td><?php echo $dta[co_docref] ?></td>
					</tr>
					<tr style="font-size: 10px" >
						<td>
							FECH. DOC. REF.
						</td>
						<td><?php echo date('d/m/Y', strtotime($dta[co_fech_ref])) ?></td>
					</tr>
					<tr style="font-size: 10px" >
						<td>MOTIVO</td>
						<td>
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
					<tr style="font-size: 10px" >
						<td>GLOSA</td>
						<td><?php echo $dta[co_glosa] ?></td>
					</tr>
				<?php
			}
		?>
	</table>
	<table style=" width: 100%;font-family: Arial;font-size: 9px  " cellspacing="0.7" cellpadding="0.7">
		<tr>
			<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
		</tr>
		<tr style="text-align: center;">
			<td style="width: 9px">CANT.</td>
			<td ><?php echo utf8_encode('DESCRIPCIÓN') ?></td>
			<td >P. UNIT</td>
			<td >TOTAL</td>
		</tr>
		<tr>
			<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
		</tr>
		<?php 
			if ($dta[co_cargo]) {
				?>
					<tr>
						<td><center>1</center></td>
						<td>
							<?php echo ($dtprod[0][de_tipo_encomienda]==1)?'(SOBRE) ':'(PAQUETE) '; ?>
							<?php echo $dtprod[0][de_descrip] ?>
						</td>
						<td style="text-align: right;"><center><?php echo number_format($dta[co_total],2) ?></center></td>
						<td style="text-align: right;"><center><?php echo number_format($dta[co_total],2) ?></center> </td>
					</tr>
					<?php
			}else{
				foreach ($dtprod as $dta2):
					?>
						<tr>
							<td><center><?php echo $dta2[de_cant] ?></center></td>
							<td style="text-align: left;"><?php echo mb_strtoupper($dta2[descrip]) ?></td>
							<td style="text-align:right; "><?php echo number_format($dta2[de_unit],2) ?></td>
							<td style="text-align:right; "><?php echo number_format($dta2[de_total],2) ?></td>
						</tr>
					<?php
				endforeach; 
			}
		?>
		<tr>
			
			<td colspan="2" style="padding: 10px">
				<?php 
					$subtt=$dta[co_total]/1.18;

					if (strlen($dta[co_ruc_envia])==8) {$nuu='01';}else{$nuu='06';}

				?>	<br>			
			</td>
			<td colspan="2" style="width: 100%; vertical-align: top;padding: 0px 0px 0px">
				<table style="width: 100%;align-content: initial;  "> 
					<tr>
						<td colspan="4" style="text-align: right;">SUB TOTAL: S/</td>
						<td style="text-align: right;"><?php echo number_format($subtt,2) ?></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">GRAVADA: S/</td>
						<td style="text-align: right;"><?php echo number_format($subtt,2) ?></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;white-space:nowrap;">I.G.V.(18%): S/</td>
						<td style="text-align: right;"><?php echo number_format($dta[co_total]-$subtt,2) ?></td>
					</tr>
					<tr>
						<td colspan="4" style="text-align: right;">TOTAL: S/</td>
						<td style="text-align: right;"><?php echo number_format($dta[co_total],2) ?></td>
					</tr>
				
				</table>
			</td>
		</tr>
		
		<tr>
			<td colspan="4">SON: <?php echo  strtoupper(CifrasEnLetras::convertirEurosEnLetras(number_format($dta[co_total], 2, ',', '.'),2)); ?>/100 Soles.</td>
		</tr>
		<tr>
			<td style="border-top: 0.5px solid; border-top-style: dashed;  " colspan="4"></td>
		</tr>
		<tr>
			<td colspan="4" style="padding: 2px">
				<center>
				<?php 
					$subtt=$dta[co_total]/1.18;
					if (strlen($dta[co_ruc_envia])==8) {$nuu='01';}else{$nuu='06';}
						$cod=__RUC__.' | '.$dta[co_tipo].' | '.$dta[co_serie].' | '.$dta[co_correlativo].' | '.number_format($dta[co_total]-$subtt,2).' | '.number_format($dta[co_total],2).' | '.$dta[co_fecha].' | '.$nuu.' | '.$dta[co_ruc_envia].' | ';
						QRcode::png($cod,"../../recursos/qr/temp/".$serie.".png",QR_ECLEVEL_L,3,1);
						echo '<img style="width:80px;" src="../../recursos/qr/temp/'.$serie.'.png"/>';
				?>
				</center>				
			</td>
		</tr>
		<?php 
			if ($dta[co_tipo]!='07' && $dta[co_tipo]!='08') {
				?>
					<tr>
						<td colspan="4">
							<center>
								<?php echo utf8_encode('REPRESENTACIÓN') ?> IMPRESA DE LA FACTURA <?php echo utf8_encode('ELECTRÓNICA') ?>  <br>Usted puede consultar su CPE, desde su clave sol o ingresando<br><center>https://www.cpe.faskex.com </center>
								Faskex agradece su preferencia

								
								<?php 
									if ($dta[co_cargo]) {
										?>
											</center><br>
											<b>Fecha de </b><?php echo utf8_encode('Emisión : '). date("d/m/Y - h:i a", strtotime($dta[co_fecha])) ?><br>				
											Agencia <?php
									$class = new Mod(); 
	    							$ts2= $class->sel5($dta[part]);
	    							echo utf8_encode('Emisión.. : '.explode("-",$ts2[0][ub])[2]);
								   ?>
											<center><?php echo mb_strtoupper ($dta[nom]) ?></center>			
											-------------------------------------------------------------------------------------- <br><center>
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
															6-Toda declaracion del contenido de la encomienda es responsabilidad del usuario conforme a ley <?php echo utf8_encode('Nº') ?> 27444
															<br><br><br>
															<center>__________________ <br>Recibi Conforme</center>
															<br>
														<?php
													}
												?>
												
												
											</td>
										</tr>


									<?php
								}else{
									?>
										<tr>
											<td colspan="4"><center>
												REPRESENTACION IMPRESA DE LA <?php echo $tip_comp ?> ELECTRONICA  <br>Usted puede consultar su CPE, desde su clave sol o ingresando a la pagina web: <br> https://www.cpe.faskex.com <br>
												
											</td>
										</tr>
									<?php
								}
							?>
	</table>	
</body>

</html>
<?php 
		endforeach; 
	?>
