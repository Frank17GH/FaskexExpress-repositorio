<?php 
	include_once  "../../../recursos/db.class.php";
	include_once( "../.Model.php" );
	$class = new Mod();
    $ts1= $class->printManifiesto($_GET['id']);
    $class2 = new Mod();
    $ts2= $class2->printManifiestoDet($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Impresión | <?php echo __RAZON__ ?></title>
</head>
<body onload="window.print();" onafterprint="window.close();" style="padding: 30px">
	<?php 
		foreach ($ts1 as $dta): 
			?>
				<table style="width: 100%">
  					<tr>
  						<td style="width: 5px">
  							<img width="260" src="../components/logo.jpg">
  						</td>
  						<td style="text-align: right;">
  							<?php 
								if ($dta['serie']=='F001') {
									?>
										<label style="font-size: 16px; transform:scaleY(30);">
											CAJAMARCA: <br>
											Av. Atahualpa N° 347 <br>
											Cel.:950914955/Cel.: 971490667
										</label>
										<br>
										<label style="font-size: 11px;">CAJAMARCA - CAJAMARCA - CAJAMARCA</label>
									<?php
								}else{
									?>
										<label style="font-size: 16px; transform:scaleY(30);">
											LIMA: <br>
											Jr. Alexander Von Humbolt N° 527 <br>
											Cel.:950914955/Cel.: 971490667
										</label>
										<br>
										<label style="font-size: 11px;">LIMA - LIMA - LA VICTORIA</label>
									<?php
								}
							?>
  						</td>
  					</tr>
		  			<tr>
		  				<td colspan="2"><hr></td>
		  			</tr>
		  			<tr>
		  				<td colspan="2">
		  					<center>
		  						<b>MANIFIESTO DE CARGA N° <?php echo str_pad($dta['idmanifiestos'], 10, "0", STR_PAD_LEFT) ?></b>
		  					</center>
		  				</td>
		  			</tr>
		  		</table>
		  		<table style="width: 100%; font-size: 11px;">
		  			<tr>
		  				<td>
		  					<b>Fecha:</b>	
		  				</td>
		  				<td>
		  					<?php echo date('d/m/Y', strtotime($dta['fecha_envio'])) ?>
		  				</td>
		  				<td>
		  					<b>Procedencia:</b>	
		  				</td>
		  				<td>
		  					<?php echo $dta['ma_origen'] ?>
		  				</td>
		  				<td>
		  					<b>Destino:</b>	
		  				</td>
		  				<td>
		  					<?php echo $dta['ma_destino'] ?>
		  				</td>
		  			</tr>
		  			<tr>
		  				<td>
		  					<b>Hora:</b>	
		  				</td>
		  				<td>
		  					<?php echo date('h:i a', strtotime($dta['ma_turno'])) ?>
		  				</td>
		  				<td>
		  					<b>Piloto:</b>	
		  				</td>
		  				<td>
		  					<?php echo $dta['nom'] ?>
		  				</td>
		  				<td>
		  					<b>Placa:</b>	
		  				</td>
		  				<td>
		  					<?php echo $dta['ve_placa'] ?>
		  				</td>
		  			</tr>
		  		</table>
	  			<table style="width:100%;font-size: 10px" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
					<tr style="">
						<td style="width:10px;"><b><center>ITEM</center></b></td>
						<td style=""><b><center>CONSIGNADO</center></b></td>
						<td style=" width: 5PX;"><b><center>CANT</center></b></td>
						<td style=""><b><center>DESCRIPCION</center></b></td>
						<td style="width:60px;"><b><center>B.V</center></b></td>
						<td style="width:60px;"><b><center>GUIA N°</center></b></td>
						<td style="width:60px;"><b><center>FACTURA</center></b></td>
						<td style="width:60px;"><b><center>IMPORTE</center></b></td>
					</tr>
					<?php $cc=1;  foreach ($ts2 as $data2): ?>
			
							<tr>
								<td><center><?php echo $cc ?></center></td>
								<td>
									<?php echo $data2['destinoNombre'] ?>
								</td>
								<td style="text-align: center;">
									<?php echo $data2['cantidad'] ?>
								</td>
								<td>
									<?php echo $data2['detalle'] ?>
								</td>
								<td>
									
								</td>
								<td style="text-align: center;">
									<?php echo $data2['ser'] ?>
								</td>
								<td>
									
								</td>
								<td style="text-align: right;">
									<?php echo $data2['flete']?'S/. '.number_format($data2['flete'],2):'-' ?>
								</td>
							</tr>
					<?php $cc++; endforeach; ?>
				</table>
				<br>
				<br>
				<table style="width: 100%;">
					<tr>
						<td style="text-align: center;">
							______________ <br>Chofer
						</td>
						<td style="text-align: center;">
							______________ <br>Oficina
						</td>
						<td style="text-align: center;">
							______________ <br>Sucursal
						</td>
					</tr>
				</table>
			<?php 
		endforeach; 
	?>
</body>
</html>