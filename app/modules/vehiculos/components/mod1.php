<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6><?php echo ($s02)?'DETALLE DE VEHICULO':'NUEVO VEHICULO' ?></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="widget-body">
					<form class="form-horizontal" action="javascript:vAjax('vehiculos','insert1','frm1')" id="frm1">
						<input type="hidden" value="<?php echo $s02 ?>" name="id">
						<fieldset>
							<div class="form-group">
								<div class="col-md-4">
									<label><b>PLACA</b></label>
									<input name="placa" value="<?php echo $dt2[0][ve_placa] ?>" placeholder="#####" class="form-control">
								</div>
								<div class="col-md-4">
									<label><b>MODELO</b></label>
									<input name="modelo" class="form-control" value="<?php echo $dt2[0][ve_modelo] ?>">
								</div>
								<div class="col-md-4">
									<label><b>MARCA</b></label>
									<input name="marca" class="form-control" value="<?php echo $dt2[0][ve_marca] ?>">
								</div>
							</div>
							<div class="col-md-12"></div>
							<div class="form-group">
								<div class="col-md-12">
									<label><b>PROPIETARIO</b></label>
									<select class="form-control" name="prop">
										<option>FASK EXPRESS S.A.C</option>
									</select>
								</div>
							</div>
							<div class="col-md-12"></div>
							<div class="form-group">	
								<div class="col-md-6">
									<label><b>CONFIGURACIÓN VEHICULAR</b></label>
									<select class="form-control" name="config" id="idconfig" onchange="vAjax('vehiculos','img',$(this).val(),'img');">
										<option value="0">Seleccione una configuración</option>
										<?php 
											foreach ($dt1 as $dta1): 
												?><option value="<?php echo $dta1[idvehiculosconfig] ?>" <?php echo ($dt2[0][idvehiculosconfig]==$dta1[idvehiculosconfig])?'selected':'' ?>><?php echo $dta1[co_nombre] ?></option><?php
											endforeach; 
										?>
									</select>
								</div>
								<div class="col-md-6">
									<label><b>CONSTANCIA DE SUSCRIPCIÓN</b></label>
									<input name="const" placeholder="#########" value="<?php echo $dt2[0][ve_inscripcion] ?>" class="form-control" required="">
								</div>
							</div>
							<div class="col-md-12">
								<hr>
								<div id="div-img" style="text-align: center;"></div>
							</div>
							<div class="col-md-12"><br></div>
							<div class="col-md-12">
								<select class="form-control" name="estado">
									<option value="1" <?php echo ($dt2[0][ve_estado])?'selected':'' ?>>Activo</option>
									<option value="0" <?php echo (!$dt2[0][ve_estado])?'selected':'' ?>>Inactivo</option>
								</select>
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
<script type="text/javascript">vAjax('vehiculos','img',$('#idconfig').val(),'img');</script>