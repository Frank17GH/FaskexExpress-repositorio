
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h6><b>CAMBIAR ESTADO</b></h6>
	</div>
	<div class="modal-body">
		<?php 
			foreach ($dt1 as $dta1): 
				?>
					<div class="row">
						<fieldset>
							<div class="form-group">
								<label class="col-md-4"><b>VEHICULO</b></label>
								<div class="col-md-8">
									<input class="form-control input-xs" name="placa" style="text-align: center;" value="<?php echo $dta1[ve_placa] ?>">			
								</div>
							</div>
							<div class="col-md-12"></div>
							<div class="form-group">
								<label class="col-md-4"><b>CONDUCTOR</b></label>
								<div class="col-md-8">
									<input class="form-control input-xs" name="" value="<?php echo $dta1[pers] ?>" readonly="">
								</div>
							</div>
							<div class="col-md-12"><hr></div>
							<div class="form-group">
								<label class="col-md-4"><b>ESTADO</b></label>
								<div class="col-md-8">
									<select class="form-control input-xs">
										<option value="1" <?php echo ($dta1[ru_estado])?'selected':'' ?>>ACTIVO</option>
										<option value="0" <?php echo (!$dta1[ru_estado])?'selected':'' ?>>INACTIVO</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-12"><br></div>
							<div class="col-md-12">
								<div class="table-responsive" id="div-tbl2">
									<script type="text/javascript">vAjax('rutas','tabla2','<?php echo $s02 ?>','tbl2')</script>
								</div>
							</div>
							
						</fieldset>
					</div>
				<?php
			endforeach; 
		?>
	</div>
	<div class="modal-footer">
		
		<div class="edit" style="display: ">
			<button class="btn btn-primary" onclick="vAjax('personal-cargos','insert2','frms')">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
				<i class="fa fa-remove"></i>
				Cancelar
			</button>
		</div>
	</div>
</div>