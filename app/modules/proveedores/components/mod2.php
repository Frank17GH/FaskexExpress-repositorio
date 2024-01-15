
<div class="modal-content" id="div-modal"> 
	<div class="modal-header" style="padding: 10px;">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h4 class="modal-title" id="myModalLabel">Detalle de Proveedor</h4>
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
													<?php echo ($dta['cl_tipdoc']==1)?'D.N.I:':'R.U.C:'; ?>
												</strong>
												<div class="col-md-8 view">
													<span><?php echo $dta['cl_numdoc'] ?></span>
													
												</div>
												<div class="col-md-8 edit" style="display: none">
													<div class="input-group input-group-md">
													    <div class="icon-addon addon-md">
													        <input placeholder="#" name="doc" id="Dnni" value="<?php echo $dta['cl_numdoc'] ?>" class="form-control input-xs" required="">
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
												<strong class="col-md-4"><?php echo ($dta['cl_tipdoc']==1)?'Nombres':'Razón Social'; ?>: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['cl_nombres'] ?></span>
													<input class="form-control edit input-xs" id="verNom" name="nom" style="display: none" value="<?php echo $dta['cl_nombres'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Giro: </strong>
												<div class="col-md-8 view">
													<span><?php echo '('.$dta['cl_ciiu'].') '.$dta['cl_giro'] ?></span>
												</div>
												<div class="edit" style="display: none">
													<div class="col-md-2">
														<input class="form-control input-xs" id="ciiu" name="ciiu" placeholder="####" value="<?php echo $dta['cl_ciiu'] ?>">
													</div>
													<div class="col-md-6">
														<input class="form-control input-xs" id="vgiro" name="giro" placeholder="NOMBRE DE ACTIVIDAD ECONOMICA" value="<?php echo $dta['cl_giro'] ?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Teléfonos: </strong>
												<div class="col-md-8">
													<a  class="view" href="https://web.whatsapp.com/send?phone=51<?php echo $dta['cl_telefono'] ?>&text=" target="_blank"><?php echo $dta['cl_telefono'] ?><img src="app/recursos/img/wp.png" width="22px"></a>
													<input class="form-control edit input-xs" name="tel" style="display: none" value="<?php echo $dta['cl_telefono'] ?>">
													
												</div>
											</div>

											<div class="form-group">
												<strong class="col-md-4">Correo: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['cl_correo'] ?></span>
													<input class="form-control edit input-xs" name="correo" style="display: none" value="<?php echo $dta['cl_correo'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Dirección: </strong>
												<div class="col-md-8">
													<span class="view"><?php echo $dta['cl_direccion'] ?></span>
													<input class="form-control edit input-xs" id="verDirr" name="dir" style="display: none" value="<?php echo $dta['cl_direccion'] ?>">
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Departamento: </strong>
												<div class="col-md-8">
													<select class="form-control input-xs" id="prov" onchange="provi($(this).val(),'idprov')">
						                            <option value="0">Seleccione un Departamento</option>
						                            <?php 
						                                $class = new Mod();
						                                $ts = $class->sel1();
						                                foreach ($ts as $ts1): 
						                                    ?><option value="<?php echo $ts1[iddepartamento] ?>" <?php echo ($ts1[iddepartamento]==$dta[iddepartamento])?'selected':''; ?>><?php echo $ts1[nombre] ?></option><?php
						                                 endforeach;
						                            ?>
						                        </select>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Provincia: </strong>
												<div class="col-md-8">
													<select class="form-control input-xs" id="idprov" onchange="dist($(this).val(),'iddist')">
						                            <option value="0">Seleccione un Departamento</option>
						                            <?php 
								                        $class = new Mod();
								                        if(!$data[dep]){$data[dep]=0;}
	            										$fdep = $class->sel2($dta[iddepartamento]); 
	            										foreach ($fdep as $prov):
	            											?>
	            											<option value="<?php echo $prov[idprovincia] ?>" <?php echo ($prov[idprovincia]==$dta[idprovincia])?'selected':''; ?>><?php echo mb_strtoupper(utf8_encode($prov[nombre])) ?>
	            											</option><?php
	            										endforeach; 
								                    ?>
						                        </select>
												</div>
											</div>
											<div class="form-group">
												<strong class="col-md-4">Distrito: </strong>
												<div class="col-md-8">
													<select class="form-control input-xs" id="iddist" name="recibe_dist">
							                            <option value="0">Seleccione una Provincia</option>
							                            <?php 
							                        		$class = new Mod();
            												$fdist = $class->sel3($dta[idprovincia]); 
            												foreach ($fdist as $dist):
            													?>
            													<option value="<?php echo $dist[iddistrito] ?>" <?php echo ($dist[iddistrito]==$dta[iddistrito])?'selected':''; ?>><?php echo mb_strtoupper(utf8_encode($dist[nombre])) ?>
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
								<span><?php echo $dta['user'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['cl_fecha_crea'])) ?>)</i></span>
							</div>
						</div>
						<div class="form-group">
							<strong class="col-md-4">Modificación: </strong>
							<div class="col-md-8">
								<span><?php echo $dta['user2'] ?> <i>(<?php echo date("d/m/Y h:i a", strtotime($dta['cl_fech_mod'])) ?>)</i></span>
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
				<form id="frmc" action="javascript: vAjax('proveedores','insert2','frmc'); ">
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
							<td class="edit" style="display: none; width: 5px"><b>Acc.</b></td>
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
													<a class="btn btn-default input-xs" title="Eliminar" onclick="confir('Confirmación','Seguro que deseas eliminar el contacto seleccionado?','proveedores','del1',<?php echo $dta2['idcontacto'] ?>,'remove')">
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
			<button class="btn btn-primary" onclick="vAjax('proveedores','insert1','frms')">
				<i class="fa fa-check"></i>
				Guardar
			</button>
			<button class="btn btn-danger" type="button" onclick="confir('Confirmación','Seguro que deseas eliminar el cliente seleccionado?','proveedores','del2',<?php echo $s02 ?>,'remove')">
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
<script> sel2('prov');sel2('idprov');sel2('iddist');</script>