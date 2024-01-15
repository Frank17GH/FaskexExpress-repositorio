
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h4 class="modal-title" id="myModalLabel"><b>Detalles del cargo</b></h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<form id="frms" class="form-horizontal">
				<input type="hidden" name="id" value="<?php echo $s02 ?>">
			<?php 
				if($dt1){
					$id=0;
                	foreach ($dt1 as $dta): 
                    	?>
						<div class="col-md-12">
							<div role="content">
								<div class="jarviswidget-editbox"></div>
								<div class="widget-body">
									<form id="form-horizontal" class="form-horizontal">
										<fieldset>
											<div class="form-group">
												<strong class="col-md-4">
													Descripción:
												</strong>
												<div class="col-md-8 view">
													<span><?php echo $dta['ca_descripcion'] ?></span>
												</div>
												<div class="col-md-8 edit" style="display: none">
												    <div class="icon-addon addon-md">
												        <input name="des" value="<?php echo $dta['ca_descripcion'] ?>" class="form-control" required="">
												    </div>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">
												Estado: </strong>
												<div class="col-md-8">
													<span class="view">
														<?php 
															if ($dta['ca_estado']) {
																?><a class="btn btn-success btn-sm" href="javascript:void(0);">&nbsp;&nbsp;ACTIVO&nbsp;&nbsp;</a><?php
															}else{
																?><a class="btn btn-danger btn-sm" href="javascript:void(0);">INACTIVO</a><?php
															}
															
														?>
													</span>
													<select name="estado" style="display: none" class="form-control edit">
														<option value="1" <?php echo ($dta['ca_estado'])?'selected':''; ?>>Activo</option>
														<option value="0" <?php echo (!$dta['ca_estado'])?'selected':''; ?>>Inactivo</option>
													</select>
													
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
						
						<div class="col-md-12"></div>
						<div class="form-group">
							<div class="col-md-12"><hr style="width: 90%"></div>
						</div>
						<div class="form-group">
							<strong class="col-md-4">Creación: </strong>
							<div class="col-md-8">
								<span><?php echo $dta['crea'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['fecha_create'])) ?>)</i></span>
							</div>
						</div>
						<div class="form-group">
							<strong class="col-md-4">Modificación: </strong>
							<div class="col-md-8">
								<span><?php echo $dta['actua'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['fecha_update'])) ?>)</i></span>
							</div>
						</div>
						<?php 
                	endforeach; 
            	}
        	?>
        	</form>
        	<div class="form-group">
				<div class="col-md-12"><hr style="width: 90%"></div>
			</div>
			<div class="col-md-12">
				<form id="frmc" action="javascript: vAjax('clientes','insert1','frmc'); ">
					<input type="hidden" name="id" value="<?php echo $s02 ?>">
					<table style="width: 100%; font-size: 12px" class="table table-striped table-bordered table-hover dataTable no-footer">
					<tbody>
						<tr>
							<td colspan="4"><center><b>Personas</b></center></td>
						</tr>
						<tr>
							<th><b>D.N.I.</b></th>
							<td><b>Nombres</b></td>
							<td class="edit" style="display: none; width: 5px">Borrar</td>
						</tr>
						<tbody id="detc">
							<?php 
								if($dt2){
	               					foreach ($dt2 as $dta2): 
	               						?>
											<tr id="tr<?php echo $dta2['idpersonal'] ?>">
					       						<td><?php echo $dta2['pe_dni'] ?></td>
					       						<td><?php echo $dta2['pe_apellidos'].' '.$dta2['pe_nombres']; ?></td>
					       						<td class="edit" style="display: none">
													<a class="btn btn-default input-xs" title="Eliminar" onclick="confir('Confirmación','Seguro que deseas eliminar el cargo de la persona seleccionada seleccionada?','personal-cargos','del1',<?php echo $dta2['idpersonal'] ?>,'remove')">
														<i class="glyphicon glyphicon-trash"></i>
													</a>
				       							</td>
						       				</tr>
	                					<?php
	                				endforeach; 
	            				}
							?>
						</tbody>
       				</tbody>
       			</table>
				</form>
			</div>
		</div><br><br>
	</div>
	<div class="modal-footer">
		<div class="view">
			<button class="btn btn-primary" onclick="$('.edit').show();$('.view').hide()">
				<i class="fa fa-edit"></i>
				Editar
			</button>
			<button class="btn btn-default"  data-dismiss="modal">
				<i class="fa fa-remove"></i>
				Cerrar
			</button>
		</div>
		
		<div class="edit" style="display: none">
			<button class="btn btn-primary" onclick="vAjax('personal-cargos','insert2','frms')">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el cliente seleccionado?','personal-cargos','del2',<?php echo $s02 ?>,'remove')">
				<i class="fa fa-trash"></i>
				Eliminar
			</button>
			<button class="btn btn-default" onclick="$('.edit').hide();$('.view').show()">
				<i class="fa fa-remove"></i>
				Cancelar
			</button>
		</div>
	</div>
</div>