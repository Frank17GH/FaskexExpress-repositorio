<?php
	include_once  "../../recursos/db.class.php";
	include_once( ".Model.php" );
	include_once('letras.php');
	include_once "../../recursos/qr/phpqrcode/qrlib.php";
	$class = new Mod(); 
    $ts1= $class->printguia($_GET['id']); 
    $class = new Mod(); 
	$ts2= $class->detguia($_GET['id']);

	foreach ($ts1 as $dta): 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo __RUC__.'-'.$dta[gu_serie] ?>-<?php echo str_pad($dta[gu_correlativo], 8, "0", STR_PAD_LEFT); ?>
		</title>
	</head>
	<style type="text/css">
		@page {
  size: A4 portrait ; 
}
	</style>
	<body onload="window.print();"  onafterprint="window.close();"><br>
				<table style="margin-top: 180px;font-size: 10px; font-family: 'Calibri (Body)';position: fixed; margin-left: 100px" id="header">
					<tr>
						<td style="padding: 1px;"></td>
						<td style="padding: 1px;" colspan="3"><?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
						<td style="padding: 1px;width: 200px;"></td>
						<td style="padding: 1px;" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y', strtotime($dta[gu_fecha])) ?></td>
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
						<td></td>
						<td colspan="3">
							<br><?php echo $dta[co_nombre_envia] ?>
						</td>
						<td></td>
						<td colspan="3">
							<br><?php echo $ts2[0][de_nombre] ?>
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
				<table style="font-size: 10px;margin-top: 300px; font-family: Arial; margin-left: 50px; position: fixed;">
					<tr>
						<td style="width: 100px">1</td>
						<td style="width: 780px">
							<?php 
								if ($ts2[0][de_tipo_encomienda]==1) {
									echo '(SOBRE) '.$ts2[0][de_descrip];
								}else{
									echo '(PAQUETE) '.$ts2[0][de_descrip];
								}
							?>
						</td>
						<td style="text-align: center;width: 120px">1</td>
						<td style="text-align: center;width: 120px"><?php echo $ts2[0][de_medida] ?></td>
						<td style="text-align: center;width: 120px"><?php echo number_format($ts2[0][de_peso],2) ?></td>
					</tr>
				</table>
				<table style="margin-top: 440px;position: fixed;font-size: 10px; font-family: Arial; margin-left: 120px" id="footer">
					<tr>
						<td>
							<table style="width: 350px">
								<tr>
									<td><?php echo __RAZON__ ?></td>
								</tr>
								<tr>
									<td><?php echo __RUC__ ?></td>
								</tr>
								<tr>
									<td><br><br><br><br>
										<table>
											<tr>
												<td></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dta[co_ruc_envia] ?></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
						<td></td>
						<td>
							<?php 
								$class = new Mod(); 
				    			$ts4= $class->sel2($dta[idrutas]);
							?>
							<table style="width: 100%;    margin-left: 60px; margin-top: -60px">
								<tr>
									<td></td>
									<td><?php echo $ts4[0][ve_marca] ?></td>
									<td style="width: 100px"></td>
									<td><?php echo $ts4[0][ve_placa] ?></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"><?php echo $ts4[0][co_nombre] ?></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"><?php echo $ts4[0][ve_inscripcion] ?></td>
								</tr>
								<tr>
									<td></td>
									<td colspan="3"><?php echo $ts4[0][pe_num_auto] ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
	</body>
</html>
<?php 
	endforeach; 
?>