<?php 
	if ($dt1) {
		?>
			<div class="col-md-6"><label><b>CONDUCTOR</b></label>
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $dt2[0][nom] ?>" readonly="">
					<input type="hidden" value="<?php echo $dt2[0][idpersonal] ?>" name="piloto">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
				</div>
			</div>
			<div class="col-md-4"><label><b>VEHICULO</b></label>
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo '[ '.$dt2[0][ve_marca].' ] '.$dt2[0][ve_modelo] ?>" readonly="">
					<input type="hidden" value="<?php echo $dt2[0][idvehiculos] ?>" name="vehi">
					<span class="input-group-addon"><i class="fa fa-truck"></i></span>
				</div>
			</div>
			<div class="col-md-2"><label><b>PLACA</b></label>
				<div class="input-group">
					<input type="text" class="form-control" style="text-align: center;" value="<?php echo $dt2[0][ve_placa] ?> " readonly="">
					<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
				</div>
			</div>
			<div class="col-md-12"><br></div>
			<table class="table">
				<tr>	
					<td style="width: 1px"></td>
					<td style="width: 1px">#</td>
					<td>Destino</td>
					<td>Correlativo</td>
					<td>Consignatario</td>
					<td>Descripción</td>
					<td>Cantidad</td>
					<td style="width: 5px"></td>
					<td style="width: 5px">Importe</td>
					<td style="width: 5px">Ver</td>
				</tr>
				<?php 
					$cc=0;$tt=0; $det='';
					foreach ($dt1 as $dta1): $cc++;$det.=$dta1[idcomprobante].',';
						?>
							<tr>
								<td>
									<input type="checkbox" checked="">
								</td>
								<td><?php echo $cc; ?></td>
								<td><b><?php echo $dta1[idlocales] ?></b></td>
								<td><?php echo $dta1[co_serie].'-'.str_pad($dta1[co_correlativo], 8, "0", STR_PAD_LEFT); ?></td>
								<td><?php echo $dta1[de_nombre] ?></td>
								<td><?php echo $dta1[de_descrip] ?></td>
								<td style="text-align: center;">1</td>
								<td>S/.</td>
								<td style="text-align: right;"><?php $tt+=$dta1[co_total]; echo number_format($dta1[co_total],2) ?></td>
								<td><a class="btn btn-default btn-xs" href="javascript:void(0);" onclick="vAjax('facturacion','mod1','0-/<?php echo $dta1[idcomprobante] ?>','modal1');">Imprimir</a></td>
							</tr>
						<?php
					endforeach; 
				?>
				<tr>
					<td colspan="6" style="text-align: right;"><h4>TOTAL</h4></td>
					<td style="text-align: center;"><h4><?php echo $cc; ?></h4></td><td>S/.</td>
					<td style="text-align: right;"><h4><?php echo number_format($tt,2) ?></h4></td>
				</tr>
			</table>
			<input type="hidden" value="<?php echo $det; ?>" name="detcc">
		<?php
	}else{
		?>
			<i><center>No hay Envios disponibles <br><br></center></i>
		<?php
	}
?>