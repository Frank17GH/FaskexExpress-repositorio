<script type="text/javascript">$('#div-modal4').empty()</script>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		×
	</button>
	<h6 class="modal-title"><b>NUEVO ASIENTO CONTABLE</b></h6>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div role="content">
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body">
					<form class="form-horizontal" action="javascript: vAjax('finanzas_conf','insert2','frm1'); " id="frm1">
						<input type="hidden" name="id" value="<?php echo ($s02)?$s02:''; ?>">
						<fieldset>
							<div class="">
								<div class="form-group">
									<div class="col-md-4">
										<label><b>CÓDIGO <font style="color: red">*</font></b></label>
										<input type="text" class="form-control" value="<?php echo ($s02)?$dt2[0][idasiento]:'' ?>" name="cod">
									</div>
									<div class="col-md-8">
										<label><b>DESCRIPCIÓN <font style="color: red">*</font></b></label>
										<div class="input-group input-group-md" style="width: 100%">
											<textarea class="form-control" name="descrip"><?php echo ($s02)?$dt2[0][ca_descripcion]:'' ?></textarea>
										</div>
									</div>
									<div class="col-md-12"><br></div>
									<div class="col-md-6">
										<label><b>CATEGORÍA</b></label>
										<select class="form-control" name="cat">
											 <?php 
									            if($dt1){
									                foreach ($dt1 as $dta1): 
									                    ?><option value="<?php echo $dta1[idcategoria] ?>" <?php echo ($dta1[idcategoria]==$dta2[idcategoria])?'selected':'' ?>><?php echo $dta1[ca_descripcion] ?></option><?php 
									                endforeach; 
									            }else{
									            	?><option value="0">Sin Categoria</option><?php
									            }
									        ?>
										</select>
									</div>
									<div class="col-md-6">
										<label><b>ESTADO</b></label>
										<select class="form-control" name="est">
											<option value="1" <?php if($s02){if($dt2[0][as_estado]){echo 'selected';}} ?>>ACTIVO</option>
											<option value="0" <?php if($s02){if(!$dt2[0][as_estado]){echo 'selected';}} ?>>INACTIVO</option>
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
					<button class="btn btn-danger"  onclick="confir('Confirmación','Seguro que deseas eliminar el asiento seleccionada?','finanzas_conf','del2',<?php echo $s02 ?>,'remove')">Eliminar</button>
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