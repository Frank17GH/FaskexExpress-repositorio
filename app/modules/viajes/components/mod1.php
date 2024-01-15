<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6>NUEVO VIAJE</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" action="javascript:vAjax('viajes','insert1','frm1')" id="frm1">
						<input type="hidden" value="<?php echo $s02 ?>" name="id">
						<fieldset>
							<div class="form-group">	
								<div class="col-md-12">
									<label><b>LUGAR DE PARTIDA</b></label>
									<select class="form-control" name="origen">
										<option value="0">Seleccione</option>
										<?php 
											foreach ($dt1 as $dta1): 
												?>
													<option value="<?php echo $dta1[id] ?>">
														<?php echo strtoupper($dta1[direccion_origen].' ('.$dta1[ubi_origen].')') ?>
													</option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-12">
									<label><b>LUGAR DE DESTINO</b></label>
									<select class="form-control" name="destino">
										<option value="0">Seleccione</option>
										<?php 
											foreach ($dt1 as $dta1): 
												?>
													<option value="<?php echo $dta1[id] ?>">
														<?php echo strtoupper($dta1[direccion_origen].' ('.$dta1[ubi_origen].')') ?>
													</option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-12">
									<label><b>CONDUCTOR</b></label>
									<select class="form-control" name="conductor">
										<option value="0">Seleccione</option>
										<?php 
											foreach ($dt2 as $dta2): 
												?>
													<option value="<?php echo $dta2[id] ?>">
														<?php echo strtoupper($dta2[nombres]) ?>
													</option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-12">
									<label><b>VEHICULO</b></label>
									<select class="form-control" name="vehiculo">
										<option value="0">Seleccione</option>
										<?php 
											foreach ($dt3 as $dta3): 
												?>
													<option value="<?php echo $dta3[id] ?>">
														<?php echo strtoupper($dta3[ve_placa].' ('.$dta3[ve_marca].' '.$dta3[ve_modelo].')') ?>
													</option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>
<div class="modal-footer">
	<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
	<button class="btn btn-primary" type="button" onclick="$('#frm1').submit();">
		<i class="fa fa-save"></i>
		Guardar
	</button>
</div>