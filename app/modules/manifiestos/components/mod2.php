
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><?php if($dt2[0][ma_estado]==1){echo 'VERIFICACIÓN DE SALIDA';}elseif ($dt2[0][ma_estado]==2) {echo 'VERIFICACIÓN DE LLEGADA';}else{echo 'VISUALIZACIÓN DE MANIFIESTO';} ?></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<form class="form-horizontal" id="frm3">
					<input type="hidden" name="id" value="<?php echo $s02 ?>">
					<fieldset>
						<div class="col-md-6"><label><b>CONDUCTOR</b></label>
							<div class="input-group">
								<input type="text" class="form-control" value="<?php echo $dt2[0][nom] ?>" readonly="">
								<input type="hidden" value="<?php echo $dt2[0][idpersonal] ?>" name="piloto">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
							</div>s
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
									<span class="input-group-addon">####</span>
							</div>
						</div>
						<div class="col-md-12"><hr></div>
						<div class="col-md-5" ></div>
						<div class="col-md-2" >
							<?php 
								if ($dt2[0][ma_estado]!=3) {
									?>
										<div class="input-group">
											<input class="form-control input-lg" style="text-align: center;" id="barc" onkeyup="if (event.keyCode === 13){barcode($(this).val());}" placeholder="Remito" type="text" autocomplete="off">
											<span class="input-group-addon"><i class="fa fa-barcode"></i></span>
										</div>
									<?php
								} 
							?>
							
						</div>
						<div class="col-md-5" ></div>
						<div class="col-md-12"><br></div>
						<table class="table table-hover">
							<tr>	
								<th style="width: 1px">#</th>
								<th style="width: 5px">Remito</th>
								<th style="width: 5px">Correlativo</th>
								<th>Consignatario</th>
								<th>Descripción</th>
								<th style="width: 1px">Cantidad</th>
								<?php 
									if ($dt2[0][ma_estado]==2) {
										?><th style="width: 5px">Salida</th><?php
									}
									if ($dt2[0][ma_estado]==3) {
										?><th style="width: 5px">Salida</th><?php
										?><th style="width: 5px">Llegada</th><?php
									}
								?>
							</tr>
							<tbody id="idveri">
								<?php 
									$cc=0;$tt=0; $det='';
									foreach ($dt1 as $dta1): $cc++;
										?>
											<tr style="cursor: pointer;" onclick="barcode(<?php echo $dta1[iddet] ?>)" id="ttr<?php echo $dta1[iddet] ?>">
												<td><?php echo $cc; ?></td>
												<td><?php echo $dta1[iddet] ?></td>
												<td style="white-space:nowrap;"><?php echo $dta1[co_serie].'-'.str_pad($dta1[co_correlativo], 8, "0", STR_PAD_LEFT); ?></td>
												<td><?php echo $dta1[de_nombre] ?></td>
												<td><?php echo mb_strtoupper(utf8_encode($dta1[de_descrip])) ?></td>
												<td style="text-align: center;">( 1 )</td>
												<?php 
													if ($dt2[0][ma_estado]==2) {
														?><td style="text-align: center;" class="<?php echo ($dta1[est_paq]>=2)?'success':'danger' ?>"><b><?php if($dta1[est_paq]>=2){echo 'SI';}else{echo 'NO';} ?></b></td><?php
													}
													if ($dt2[0][ma_estado]==3) {
														?><td style="text-align: center;" class="<?php echo ($dta1[est_paq]==2 || $dta1[est_paq]==3 || $dta1[est_paq]==4)?'success':'danger' ?>"><b><?php if($dta1[est_paq]==2 || $dta1[est_paq]==3 || $dta1[est_paq]==4){echo 'SI';}else{echo 'NO';} ?></b></td><?php
														?><td style="text-align: center;" class="<?php echo ($dta1[est_paq]==3 || $dta1[est_paq]==4)?'success':'danger' ?>"><b><?php if($dta1[est_paq]==3 || $dta1[est_paq]==4){echo 'SI';}else{echo 'NO';} ?></b></td><?php
													}
												?>
											</tr>
										<?php
									endforeach; 
								?>
							</tbody>
						</table>
						<input type="hidden" value="" id='idet' name="detcc">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<?php 
			if($dt2[0][ma_estado]==1){
				?>
					<button class="btn btn-primary" type="button" onclick="vAjax('manifiestos','salida','frm3');">
						<i class="fa fa-save"></i>
						Guardar
					</button>
				<?php
			}elseif ($dt2[0][ma_estado]==2) {
				?>
					<button class="btn btn-primary" type="button" onclick="vAjax('manifiestos','llegada','frm3');">
						<i class="fa fa-save"></i>
						Guardar
					</button>
				<?php
			} 
		?>
		
	</div>
</div>
<script>
	$('#barc').select();
	
</script>