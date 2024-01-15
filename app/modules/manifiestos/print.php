<?php 
	include_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
	$class = new Mod();
    $ts1= $class->printMani($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Impresión | <?php echo __COM__ ?></title>
</head>
<body onload="window.print();" onafterprint="window.close();" style="padding: 30px">
	<?php 
		foreach ($ts1 as $dta): 
			
		?>
			<table style="width: 100%;font-family: Arial; border-spacing: 2px;border-collapse: separate;font-size: 14px" cellspacing="0.7" cellpadding="0.7">
				<tr>
					<td style="text-align: center;" colspan="4"><?php echo __RAZON__ ?></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: center;">SUBMANIFIESTO DE ENCOMIENDAS</td>
				</tr>
				<tr>
					<td colspan="4"><br></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: right;"><?php echo 'MANIFIESTO Nº.: '.str_pad($dta[idmanifiestos], 8, "0", STR_PAD_LEFT) ?></td>
				</tr>
			</table>
			<table style="width: 100%;font-family: Arial; border-spacing: 8px;border-collapse: separate;font-size: 12px" cellspacing="0.7" cellpadding="0.7">
				<tr>
					<td>OFICINA DE ORIGEN</td>
					<td>
						: <?php 
							$class = new Mod(); 
				    		$ts2= $class->sel4($dta[ma_origen]);
							echo mb_strtoupper($ts2[0][ub]);
						?>
					</td>
					<td>TURNO</td>
					<td>: <?php echo date('H:i',strtotime($dta[ma_turno])) ?></td>
				</tr>
				<tr>
					<td style="width: 150px">OFICINA DE DESTINO</td>
					<td>
						: <?php 
							$class = new Mod(); 
				    		$ts3= $class->sel4($dta[ma_destino]);
							echo mb_strtoupper($ts3[0][ub]);
						?>
					</td>
					<td style="width: 150px">FECHA DE ENVIO</td>
					<td>: <?php echo date('d/m/Y',strtotime($dta[fecha_envio])) ?></td>
				</tr>
				<tr>
					<td>VEHICULO</td>
					<td>: [ <?php echo $dta[ve_marca] ?> ] <?php echo $dta[ve_modelo] ?></td>
					<td>PLACA</td>
					<td>: <?php echo $dta[ve_placa] ?></td>
				</tr>
				<tr>
					<td>PILOTO</td>
					<td colspan="3">: <?php echo $dta[nom] ?></td>
				</tr>
			</table>
			<table style="width: 100%; font-family: Arial; border-spacing: 2px; font-size: 12px; border-collapse: separate;">
				<?php 
					$class = new Mod();
    				$ts4= $class->sel5($_GET['id']);
    				if ($ts4) {
    					?>
							<tr>
								<td colspan="5"><center>BOLETAS <hr></center></td>
							</tr>

							<tr>
								<td colspan="5">ENCOMIENDAS</td>
							</tr>
							<tr>
								<td>BOLETA</td>
								<td>CONSIGNATARIO</td>
								<td style="width: 5px">DIRECCION</td>
								<td>DESCRIPCIÓN</td>
								<td>IMPORTE</td>
							</tr>
							<?php $c=0;$d=0;
								
			    				foreach ($ts4 as $dta2): $c++;
									?>
										<tr>
											<td><?php echo $dta2[ser] ?></td>
											<td><?php echo $dta2[co_nombre_envia] ?></td>
											<td>OFICINA</td>
											<td>
												( <?php echo ($dta2[de_tipo_encomienda]==1)?'SOBRE':'PAQUETE '; ?> ) <?php echo $dta2[de_descrip] ?> 
											</td>
											<td style="text-align: right;">S/. <?php $d+=$dta2[co_total]; echo number_format($dta2[co_total],2) ?></td>
										</tr>
									<?php
								endforeach; 
							?>
							
							<tr>
								<td colspan="3">
									TOTAL DE BOLETAS POR ENCOMIENDAS : <?php echo $c; ?>
								</td>
								<td colspan="1" style="text-align: right;">
									TOTAL IMPORTE  
								</td>
								<td style="text-align: right;">: S/. <?php echo number_format($d,2); ?> </td>
							</tr>
    					<?php
    				}
				?>
				
				<?php 
					$class = new Mod();
    				$ts6= $class->sel6($_GET['id']);
    				if ($ts6) {
    					?>
							<tr>
								<td colspan="5"><center>FACTURAS <hr></center></td>
							</tr>

							<tr>
								<td colspan="5">ENCOMIENDAS</td>
							</tr>
							<tr>
								<td>FACTURA</td>
								<td>CONSIGNATARIO</td>
								<td>DIRECCION</td>
								<td>DESCRIPCIÓN</td>
								<td>IMPORTE</td>
							</tr>
							<?php $c=0;$d=0;
								
			    				foreach ($ts6 as $dta6): $c++;
									?>
										<tr>
											<td><?php echo $dta6[ser] ?></td>
											<td><?php echo $dta6[co_nombre_envia] ?></td>
											<td>OFICINA</td>
											<td>
												( <?php echo ($dta6[de_tipo_encomienda]==1)?'SOBRE':'PAQUETE '; ?> ) <?php echo $dta6[de_descrip] ?> 
											</td>
											<td style="text-align: right;">S/. <?php $d+=$dta6[co_total]; echo number_format($dta6[co_total],2) ?></td>
										</tr>
									<?php
								endforeach; 
							?>
							
							<tr>
								<td colspan="3">
									TOTAL DE FACTURAS POR ENCOMIENDAS : <?php echo $c; ?>
								</td>
								<td colspan="1" style="text-align: right;">
									TOTAL IMPORTE 
								</td>
								<td style="text-align: right;">: S/. <?php echo number_format($d,2); ?> </td>
							</tr>
    					<?php
    				}
				?>
				
			</table>
			</table>

		<?php 
		endforeach; 
	?>
</body>
</html>