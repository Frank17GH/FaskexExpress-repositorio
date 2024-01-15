<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h5 class="modal-title" id="myModalLabel"><b>DETALLE DEL GIRO</b></h5>
</div>
<div class="modal-body">
	<form class="form-horizontal" action="javascript: vAjax('configuracion-general','insert5','frm2') " id="frm2">
		<div class="row">
			<div role="content">
				<div class="widget-body">
					<div class="col-md-12">
						<fieldset>
							<?php 
					            if($dt1){
					                foreach ($dt1 as $data): ?>
										<input type="hidden" name="tp" value="1">
										<div class="col-md-12">
											<div class="form-group">
												<label><b>CÓDIGO</b></label>
												<input class="form-control disp" disabled type="text" name="codigo" value="<?php echo $data[idgiros]; ?>">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label><b>NOMBRE DEL GIRO</b></label>
												<input class="form-control disp label-<?php echo $data[gi_color]; ?>" style="color:white" id="cmocol" value="<?php echo mb_strtoupper($data[gi_nombre]); ?>" name="nombre" disabled>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label><b>DIRECCION</b></label>
												<input class="form-control disp " value="<?php echo mb_strtoupper($data[gi_direccion]); ?>" name="direccion" disabled>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><b>R.U.C.</b></label>
												<input class="form-control disp" type="number" value="<?php echo $data[gi_ruc]; ?>" name="ruc" autocomplete="off" disabled>
											</div>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-5">
											<div class="form-group">
												<label><b>COLOR</b></label>
												<select class="form-control disp" name="color" id="vCol" onchange="cboColor()" disabled>
													<option value="warning" <?php  echo ($data[gi_color]=='warning')?'selected':''?>>AMARILLO</option>
													<option value="primary"<?php  echo ($data[gi_color]=='primary')?'selected':''?>>AZUL</option>
													<option value="info"<?php  echo ($data[gi_color]=='info')?'selected':''?>>AZUL ELECTRICO</option>
													<option value="default"<?php  echo ($data[gi_color]=='default')?'selected':''?>>GRIS</option>
													<option value="danger"<?php  echo ($data[gi_color]=='danger')?'selected':''?>>ROJO</option>
													<option value="success"<?php  echo ($data[gi_color]=='success')?'selected':''?>>VERDE</option>
												</select>												
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><b>SERVIDOR SUNAT</b></label>
												<select class="form-control disp" name="servidor" disabled>
							                        <option value="0" <?php echo ($data[version])?'':'selected' ?>>BETA</option>
							                        <option value="1" <?php echo ($data[version])?'selected':'' ?>>PRODUCCIÓN</option>
							                    </select>
											</div>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-5" style="display:">
											<div class="form-group">
												<label><b>VERSION DE ENVIO</b></label>
												<input type="text" class="form-control disp" name="vers" disabled>
											</div>
										</div>
								 	<?php endforeach; 
						        }
						    ?>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-primary" type="button" onclick="$(this).hide();$('.edit').show();$('.disp').prop('disabled', false)"><i class="fa fa-edit"></i> Editar</button>
			<button class="btn btn-danger edit" type="button" onclick="confir('Eliminacion','¿Seguro que deseas eliminar el cliente seleccionado?','configuracion-general','del1',<?php echo $data['idlocales']; ?>,'remove');" style="display: none"><i class="fa fa-remove"></i> Eliminar</button>
			<button class="btn btn-primary edit" type="submit" style="display: none"><i class="fa fa-save"></i> Guardar</button>
			<button class="btn btn-default" data-dismiss="modal"> Cancelar</button>
		</div>
	</form>
</div>
<script type="text/javascript">
	sel2('prov',1);sel2('idprov',1);sel2('iddist',1);
	function cboColor(){
		col=$('#vCol').val();
		$('#cmocol').attr('class', 'form-control label-'+col);
	}
</script>