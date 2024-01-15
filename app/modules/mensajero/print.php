<?php 
	include_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
	$class = new Mod();
    $ts1= $class->printHoja($_GET['id']);
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
					<td colspan="4" style="text-align: center;">HOJA DE RUTA</td>
				</tr>
				<tr>
					<td colspan="4"><br></td>
				</tr>
				<tr>
					<td colspan="4" style="text-align: right;"><?php echo 'HOJA RUTA Nº.: '.str_pad($dta[idhojaruta], 8, "0", STR_PAD_LEFT) ?></td>
				</tr>
			</table>
			<table style="width: 100%;font-family: Arial; border-spacing: 8px;border-collapse: separate;font-size: 12px" cellspacing="0.7" cellpadding="0.7">
				<tr>
					<tr>
						<td>HORA Y FECHA</td>
						<td colspan="3">: <?php echo $dta[ru_fecha]?></td>
					</tr>
					<td>MENSAJERO</td>
					<td>
						: <?php 
							echo $dta[nombres]
						?>
					</td>
					<td>UBICACIÓN</td>
					<td>: <?php echo $dta[ubicacion] ?></td>
				</tr>												
			</table>


			<table style="width: 100%; font-family: Arial; border-spacing: 2px; font-size: 12px; border-collapse: separate;">
				<?php 
					$class = new Mod();
    				$ts4= $class->sel1($_GET['id']);
    				if ($ts4) {
    					?>
							<tr>
								<td colspan="6"><center>ENCOMIENDAS <hr></center></td>
							</tr>

							
							<tr>
								<td>REMITO</td>
								<td>CONSIGNATARIO</td>
								<td style="width: 5px">DIRECCION</td>
								<td>DESCRIPCIÓN</td>
								<td>TIPO</td>
							</tr>
							<?php $c=0;$d=0;
								$sobres=0;
								$paquetes = 0;
			    				foreach ($ts4 as $dta2): $c++;
			    					if ($dta2[sobre]){
			    						$sobre++;
			    					}else if ($dta2[caja]) {
			    						$caja++;
			    					}

									?>
										<tr>
											<td><?php echo $dta2[iddet] ?></td>
											<td><?php echo $dta2[de_nombre] ?></td>
											<td><?php echo $dta2[de_direccion] ?></td>
											<td style="text-align: right;"><?php echo $dta2[de_descrip] ?></td>
											<td>
												( <?php echo ($dta2[de_tipo_encomienda]==1)?'SOBRE':'PAQUETE '; ?> )
											</td>
											
										</tr>
									<?php
								endforeach; 
							?>
							<tr>
								<td colspan="6"><center>_<hr></center></td>
							</tr>
							
							<tr tyle="text-align: right;">
								<td >									
									TOTAL DE SOBRES :  <?php echo $sobre; ?>
								<br>
									TOTAL DE PAQUETES :  <?php echo $caja; ?>
								<br>
									TOTAL DE ENCOMIENDAS : <?php echo $c; ?>
								
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