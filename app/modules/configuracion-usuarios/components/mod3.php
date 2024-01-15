<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><b>NUEVO USUARIO</h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" id="frm3">
						<fieldset>
							<div class="form-group">
								<label class="col-md-3" style="margin-top: 10px"><b>NOMBRES</b></label>
								<div class="col-md-9">
									<select class="form-control" name="iduser" id="idnom" onchange="gpass()">
										<option value="0">Seleccione un trabajador</option>
										<?php 
											foreach ($dt3 as $dta): 
												?>
												<option value="<?php echo $dta[idpersonal] ?>"><?php echo '[ '.$dta[pe_dni].' ] '. mb_strtoupper($dta[pe_apellidos].', '.$dta[pe_nombres]) ?></option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3" style="margin-top: 10px"><b>LOCAL</b></label>
								<div class="col-md-9">
									<select class="form-control" name="local" id="idlocal" name="local">
										<?php 
											foreach ($dt1 as $dta): 
												?>
												<option value="<?php echo $dta[idlocales] ?>"><?php echo mb_strtoupper($dta[lo_abreviatura]) ?></option>
												<?php
											endforeach; 
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3" style="margin-top: 10px"><b>VENTAS - CAJA</b></label>
								<div class="col-md-9">
									<select class="form-control input-xs vmodi" name="cajas" style="">
										<option value="1" selected="">SI</option>
										<option value="0">NO</option>
									</select>
									<p class="note" style=""><strong>NOTA:</strong> descuentas las ventas en la caja que se encuentre activa.</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3"><b>TODOS LOS USUARIOS</b></label>
								<div class="col-md-9">
									<select class="form-control input-xs vmodi" name="vrepo" style="">
										<option value="1">TODOS LOS USUARIOS</option>
										<option value="0" selected="">SOLO LOS PROPIOS</option>
									</select>
									<p class="note" style=""><strong>NOTA:</strong> permite visualizar los reportes de todos los usuarios.</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3"  style="margin-top: 10px"><b>USUARIO</b></label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="npass" name="user" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3"  style="margin-top: 10px"><b>CONTRASEÑA</b></label>
								<div class="col-md-9">
									<input type="password" class="form-control" id="idpass" name="pass">
								</div>
							</div>
							<hr>
							<div class="form-group">
								<label class="col-md-3" style="margin-top: 10px"><b>COPIAR PERFIL</b></label>
								<div class="col-md-9">
									<select class="form-control" name="perfil" id="idperfil">
										<option value="0">Configurar desde cero</option>
										<?php 
											foreach ($dt2 as $dta): 
												?>
													<option value="<?php echo $dta[idpersonal] ?>"><?php echo mb_strtoupper($dta[pe_apellidos].', '.$dta[pe_nombres]) ?></option>
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
	<div class="modal-footer">
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="vAjax('configuracion-usuarios','insert1','frm3');">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>
<script type="text/javascript">
	sel2('idnom',1);sel2('idlocal',1);sel2('idperfil',1);
	
	function gpass(){
		if ($('#idnom').val()!=0) {
			var cadena=$('#idnom option:selected').html();
			var sec1 = cadena.split(']');
			var sec2 = sec1[1].split(' ');
			var sec3 = sec2[2].split(',');
			var nom = sec2[3].charAt(0)+sec2[1];
			$('#npass').val(nom);$('#idpass').val(nom);
		}else{
			$('#npass').val('');$('#idpass').val('');
		}
		
	}
</script>