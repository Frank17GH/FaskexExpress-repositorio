<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h2 class="modal-title" id="myModalLabel"><b><center>Detalle de Caja</center></b></h2>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="page sview2" style=""> 
				<div class="panel panel-default">
					<?php $cc=0;
						if($dt1){
   							foreach ($dt1 as $cdata): 
					?>
					<div class="panel-body" style="padding-bottom: 0px; padding-top: 4px;"><br>
						<div class="form-group col-md-12" style="margin-bottom: 3px;">

							<label class="col-md-3 control-label"><b>Responsable</b></label>
							<div class="col-md-8">
								<input class="form-control input-xs" value="<?php echo $cdata[0] ?>">
							</div>
							<div class="col-md-1"></div>
						</div>
						<div class="form-group col-md-12" style="margin-bottom: 3px;">
							<div class="col-md-1"></div>
							<label class="col-md-2 control-label"><b>Turno</b></label>
							<div class="col-md-4">
								<input class="form-control input-xs" value="<?php echo $cdata[1] ?>">
							</div>
							<div class="col-md-4">
								<input class="form-control input-xs" value="<?php if($cdata[5]==null){$cc=1;echo 'Pendiente';}else{echo date("d/m/Y h:m a", strtotime($cdata[5]));} ?>">
							</div>
						</div>
						<div class="form-group col-md-12" style="margin-bottom: 3px;">
							<div class="col-md-1"></div>
							<label class="col-md-2 control-label"><b>Inicio/Fin</b></label>
							<div class="col-md-4">
								<input class="form-control input-xs" value="<?php echo date("d/m/Y h:m a", strtotime($cdata[3])); ?>">
							</div>

							<div class="col-md-4">
								<input class="form-control input-xs" value="<?php echo date("d/m/Y h:m a", strtotime($cdata[4])); ?>">
							</div>
							<div class="col-md-5"></div>
						</div>
						
					</div>
					<?php 
						$cc=$cdata[2];
					endforeach; 
       						}
						?>
				</div>
			</div>
			<div role="content">
				<table class="table table-hover">
					<thead>
						<tr>
							<th style="width: 5px">#</th>
							<th><center>Motivo</center></th>
							<th style="width: 5px"><center>Monto</center></th>
						</tr>
					</thead>
					<tbody>
						<tr><th class="" colspan="3"><center>-- INGRESOS --</center></th></tr>
						<?php $ingre=0;$egre=0;$vent=0;
							if($dt2){$cont=0;
   								foreach ($dt2 as $idata): $cont++;
						?>
									<tr>
										<td><?php echo $cont ?></td>
										<td><?php echo $idata[0] ?></td>
										<td>S/.<?php $ingre=$ingre+$idata[1]; echo number_format($idata[1],2) ?></td>
									</tr>
								<?php endforeach; 
       						}
						?>
						<tr>
							<td colspan="2" style="text-align: right;"><b>TOTAL DE INGRESOS:</b></td>
							<td style="text-align: right;">S/.<?php echo number_format($ingre,2); ?></td>
						</tr>
						<tr><th class="" colspan="3"><center>-- EGRESOS --</center></th></tr>
						<?php 
							if($dt3){$cont=0;
    							foreach ($dt3 as $edata): $cont++;
						?>
									<tr>
										<td><?php echo $cont ?></td>
										<td><?php echo $edata[0] ?></td>
										<td>S/.<?php $egre=$egre+$edata[1]; echo number_format($edata[1],2) ?></td>
									</tr>
								<?php endforeach; 
            				}
						?>
						<tr>
							<td colspan="2" style="text-align: right;"><b>TOTAL DE EGRESOS:</b></td>
							<td style="text-align: right;">S/.<?php echo number_format($egre,2); ?></td>
						</tr>
						<tr>
							<td colspan="2" class="" style="text-align: right;"><b>TOTAL VENTAS</b></td>
							<?php 
								if($dt4){
       								foreach ($dt4 as $vdata):
							?>
										<td style="text-align: right;">
											S/.<?php $vent=$vent+$vdata[0]; echo number_format($vdata[0],2) ?>
										</td>
									<?php endforeach; 
	       						}
							?>
						</tr>
						<tr>
							<th class="" colspan="2"  style="text-align: right;">
								TOTAL NETO</th><th>S/.<?php echo number_format($vent+$ingre-$egre,2) ?>
							</th>
						</tr>
					</tbody>
				</table>
				<form id="frm_savpCaja">
					<input type="hidden" name="tt" value="<?php echo $vent+$ingre-$egre ?>">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">

		<?php 
			if ($cc!=0) {
				?>
					<button type="button" onclick="vAjax('caja_principal','savCaja','frm_savpCaja');return false" class="btn btn-primary">
						Guardar Caja
					</button>
				<?php
			}
		?>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Cerrar Ventana
		</button>
		
	</div>
</div>