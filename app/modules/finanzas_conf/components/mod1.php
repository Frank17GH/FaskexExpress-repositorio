<script type="text/javascript">$('#div-modal4').empty()</script>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><b>NUEVA CATEGORÍA</b></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('finanzas_conf','insert1','frm1'); " id="frm1">
						<input type="hidden" name="id" value="<?php echo ($s02)?$s02:''; ?>">
						<fieldset>
							<div class="">
								<div class="form-group">
									<div class="col-md-12">
										<label><b>DESCRIPCIÓN <font style="color: red">*</font></b></label>
										<div class="input-group input-group-md" style="width: 100%">
											<textarea class="form-control" name="descrip"><?php echo ($s02)?$dt1[0][ca_descripcion]:'' ?></textarea>
										</div>
									</div>
									<div class="col-md-12"><br></div>
									<div class="col-md-6"></div>
									<div class="col-md-6">
										<label><b>ESTADO</b></label>
										<select class="form-control" name="est">
											<option value="1" <?php if($s02){if($dt1[0][ca_estado]){echo 'selected';}} ?>>ACTIVO</option>
											<option value="0" <?php if($s02){if(!$dt1[0][ca_estado]){echo 'selected';}} ?>>INACTIVO</option>
										</select>
									</div>
							</div>
							<button style="display: none;" id="submt1" type="submit"></button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<?php 
			if ($s02) {
				?>
					<button class="btn btn-danger"  onclick="confir('Confirmación','Seguro que deseas eliminar la categoría seleccionada?','finanzas_conf','del1',<?php echo $s02 ?>,'remove')">Eliminar</button>
				<?php
			}
		?>
		<button class="btn btn-default"  data-dismiss="modal">Cancel</button>
		<button class="btn btn-primary" type="button" onclick="$('#submt1').click();">
			<i class="fa fa-save"></i>
			Guardar
		</button>
	</div>
</div>