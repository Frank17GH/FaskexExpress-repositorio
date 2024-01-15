
<div class="modal-content" id="div-modal"> 
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h3 class="modal-title" id="myModalLabel"><b>Detalle de Cliente</b></h3>
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
						<div class="col-md-8">
							<div role="content">
								<div class="jarviswidget-editbox"></div>
								<div class="widget-body">
									<form id="form-horizontal" class="form-horizontal">
										<fieldset>
											<div class="form-group">
												<strong class="col-md-4">
													<?php echo ($dta['pe_tipodoc']==1)?'D.N.I:':'R.U.C:'; ?>
												</strong>
												<div class="col-md-8 view">
													<span><?php echo $dta['pe_numdoc'] ?></span>
													
												</div>
												<div class="col-md-8 edit" style="display: none">
													<div class="input-group input-group-md">
													    <div class="icon-addon addon-md">
													        <input placeholder="#" name="doc" id="Dnni" value="<?php echo $dta['pe_numdoc'] ?>" class="form-control input-xs" required="">
													    </div>
													    <span class="input-group-btn">
														    <button class="btn btn-xs btn-default" type="button" onclick="buscaN($('#Dnni').val())">
														    	<i class="glyphicon glyphicon-search"></i>
														    </button>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4"><?php echo ($dta['pe_tipodoc']==1)?'Nombres':'Razón Social'; ?>: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['pe_nombres'] ?></span>
													<input class="form-control edit input-xs" id="verNom" name="nom" style="display: none" value="<?php echo $dta['pe_nombres'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Giro: </strong>
												<div class="col-md-8 view">
													<span><?php echo '('.$dta['pe_ciiu'].') '.$dta['pe_giro'] ?></span>
												</div>
												<div class="edit" style="display: none">
													<div class="col-md-2">
														<input class="form-control input-xs" id="ciiu" name="ciiu" placeholder="####" value="<?php echo $dta['pe_ciiu'] ?>">
													</div>
													<div class="col-md-6">
														<input class="form-control input-xs" id="vgiro" name="giro" placeholder="NOMBRE DE ACTIVIDAD ECONOMICA" value="<?php echo $dta['pe_giro'] ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Teléfonos: </strong>
												<div class="col-md-8">
													<a  class="view" href="https://web.whatsapp.com/send?phone=51<?php echo $dta['pe_telefono'] ?>&text=" target="_blank"><?php echo $dta['pe_telefono'] ?><img src="app/recursos/img/wp.png" width="22px"></a>
													<input class="form-control edit input-xs" name="tel" style="display: none" value="">
													
												</div>
											</div>

											<div class="form-group">
												<strong class="col-md-4">Web: </strong>
												<div class="col-md-8">
													<span class="view"><a href="https://<?php echo $dta['pe_web'] ?>" target="_blank"><?php echo $dta['pe_web'] ?></a></span>
													<input class="form-control edit input-xs" name="web" style="display: none" value="<?php echo $dta['pe_web'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Dirección: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['pe_direccion'] ?></span>
													<input class="form-control edit input-xs" id="verDirr" name="dir" style="display: none" value="<?php echo $dta['pe_direccion'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Ciudad: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['pe_ciudad'] ?></span>
													<input class="form-control edit input-xs"  name="ciudad" style="display: none" value="<?php echo $dta['pe_ciudad'] ?>">
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<img src="app/recursos/img/img_emp.png" style="width: 100%;">
						</div>
						<div class="col-md-12"></div>
						<div class="form-group">
							<div class="col-md-12"><hr style="width: 90%"></div>
						</div>
						<div class="form-group">
							<strong class="col-md-4">Creación: </strong>
							<div class="col-md-8">
								<span><?php echo $dta['user'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['pe_fecha_crea'])) ?>)</i></span>
							</div>
						</div>
						<div class="form-group">
							<strong class="col-md-4">Modificación: </strong>
							<div class="col-md-8">
								<span><?php echo $dta['user2'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['pe_fech_mod'])) ?>)</i></span>
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
							<td colspan="4"><center><b>Contactos</b></center></td>
						</tr>
						<tr>
							<th><b>Nombres</b></th>
							<td><b>Área</b></td>
							<td><b>Teléfono</b></td>
							<td class="edit" style="display: none; width: 5px">Borrar</td>
						</tr>
						<tbody id="detc">
							<?php 
								if($dt2){
	               					foreach ($dt2 as $dta2): 
	               						?>
											<tr id="tr<?php echo $dta2['idcontacto'] ?>">
					       						<td><?php echo $dta2['co_nombres'] ?></td>
					       						<td><?php echo $dta2['co_area'] ?></td>
					       						<td><?php echo $dta2['co_telefono'] ?></td>
					       						<td class="edit" style="display: none">
													<a class="btn btn-default input-xs" title="Eliminar" onclick="confir('Confirmación','Seguro que deseas eliminar el contacto seleccionado?','clientes','del1',<?php echo $dta2['idcontacto'] ?>,'remove')">
														<i class="glyphicon glyphicon-trash"></i>
													</a>
				       							</td>
						       				</tr>
	                					<?php
	                				endforeach; 
	            				}
							?>
						</tbody>
						
						<tr class="edit" style="display: none">
							<td><input class="form-control nww input-xs" name="nom" required=""></td>
							<td><input class="form-control nww input-xs" name="area" required=""></td>
							<td><input class="form-control nww input-xs" name="tel" required=""></td>
							<td>
								<button class="btn btn-success " title="Eliminar">
									<i class="fa fa-save fa-1x"></i>
								</button>
							</td>
						</tr>
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
			<button class="btn btn-primary" onclick="vAjax('clientes','insert2','frms')">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el cliente seleccionado?','clientes','del2',<?php echo $s02 ?>,'remove')">
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