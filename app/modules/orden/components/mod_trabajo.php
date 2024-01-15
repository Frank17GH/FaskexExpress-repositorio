
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title">CREACION DE MANIFIESTO</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm2">
						<fieldset>
							
					    	<div class="form-group" style="padding: 15px">
					    		<div class="col-md-2">
									<label><b>FECHA ENVIO</b></label>
									<input type="date" class="form-control" name="fecha" value="<?php echo date('Y-m-d') ?>">
									
								</div>	
								<div class="col-md-2">
									<label><b>TURNO</b></label>
										<input type="time" class="form-control" style="text-align: center;" name="turno" value="19:00">
								</div>		
								<div class="col-md-4">
									<label><b>ORIGEN</b></label>
									<div class="input-group">
										<input type="text" class="form-control" value="<?php echo $_SESSION[fasklog][lo_abreviatura] ?>" readonly="">
										<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
									</div>
									
								</div>
								<div class="form-group has-success">
									<div class="col-md-4"><label><b>DESTINO</b></label>
										<div class="input-group">
											<select class="form-control" name="destino" id="iddst" onchange="vAjax('manifiestos','tabla2',$('#iddst').val(),'tbl11')">
												<?php 
													if ($dt1) {
														foreach ($dt1 as $dta1): 
															?>
																<option value="<?php echo $dta1[idlocales] ?>" ><?php echo '[ '.$dta1[idlocales].' ] '.$dta1[gi_nombre].' - '.mb_strtoupper(utf8_encode($dta1[nombre])) ?></option>
															<?php
														endforeach;
													}
												?>
											</select>
											<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6"><label><b>CONDUCTOR</b></label>
									<div class="input-group">
										<select class="form-control" name="piloto">
											<?php 
												if ($dt2) {
													foreach ($dt2 as $dta2): 
														?><option value="<?php echo $dta2[idpersonal] ?>"><?php echo $dta2[nom] ?></option><?php
													endforeach;
												}
											?>
										</select>
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
									</div>
								</div>
								<div class="col-md-6"><label><b>VEHICULO</b></label>
									<div class="input-group">
										<select name="vehi" class="form-control">
											<?php 
												if ($dt3) {
													foreach ($dt3 as $dta3): 
														?><option value="<?php echo $dta3[idvehiculos] ?>"><?php echo '[ '.$dta3[ve_placa].' ] '.$dta3[ve_marca].', '.$dta3[ve_modelo] ?></option><?php
													endforeach;
												}
											?>
										</select>
										<span class="input-group-addon"><i class="fa fa-truck"></i></span>
									</div>
								</div>
								<div class="col-md-12"><br></div>
							<hr>
							<div id="div-tbl11">
								<script>vAjax('manifiestos','tabla2',$('#iddst').val(),'tbl11')</script>
							</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('manifiestos','insert1','frm2');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>